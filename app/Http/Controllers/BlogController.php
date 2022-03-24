<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Mail\Contact;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use App\Notifications\AuthorPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    //  public function show($slug)
    // {
    //     $post = Post::where('slug',$slug)->first();
    //     return view('user.blog-single',compact('post'));
    // }

    //Using Route model binding
    public function show(Post $post)
    {
        Post::findOrFail($post->id)->increment('views');
        $posts = Post::latest()->where('category_id','=',$post->category_id)->where('id','!=',$post->id)->take(3)->get();
        return view('user.blog-single',compact('post','posts'));
    }

    public function index()
    {
        $categories = Category::all();
        $posts = Post::latest()->paginate(9);
        return view('user.blog-index',compact('posts','categories'));
    }

    public function delete_user(User $user)
    {
        $post = Post::where('user_id','=',$user->id);
        if($post)
        {
            $post->delete();
        }
        $user->delete();
        return redirect()->back()->with('message','User deleted SuccessFully');
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('user.create-blog-post',compact('categories','tags'));
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('delete','Post deleted successfully');
    }

    public function edit(Post $post)
    {
        if(auth()->user()->id == $post->user->id)
        {
            $categories = Category::all();
            $tags = Tag::all();
            return view('user.edit-blog-post',compact('post','categories','tags'));
        }
        else
        {
            abort(403);
        }
    }
    
    public function update(Request $request,Post $post)
    {
        if(auth()->user()->id != $post->user->id)
            abort(403);
        $request->validate([
            'title' => 'required','unique:posts',
             'category_id' => 'required',
            'body'  =>'required','unique:posts','image',
        ]);

        $postId = $post->id;

        $title = Str::title($request->title);
        $slug = Str::slug($title,'-') . '-' . $postId; 
        $body =  $request->body;

        if($request->image)
        {
            //file upload
            $imagePath = 'storage/' . $request->file('image')->store('posts-Images','public');  
            $post->ImagePath = $imagePath;
        }

        
        $post->title = $title;
        $post->slug = $slug;
        $post->body = $body;
        $post->category_id = $request->category_id;
        $post->tags()->sync($request->tags);
        
        $post->save();
        return redirect()->back()->with('message','Your post are updated successfully !!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | unique:posts',
            'body'  =>'required',
            'image' => 'required | image',
            'category_id' => 'required'
        ]);
        
         if(Post::latest()->take(1)->first())            
            $postId = Post::latest()->take(1)->first()->id + 1;
         else
            $postId = 1;              
         


        $title = $request->title;
        $slug = Str::slug($title,'-') . '-' . $postId; 
        $user_id = Auth::user()->id;
        $body =  html_entity_decode($request->body);
        
        $tags = Tag::all();
                
        //file upload
        $imagePath = 'storage/' . $request->file('image')->store('posts-Images','public');  
 
                
        $post = new Post;
        $post->title = $title;
        $post->slug = $slug;
        $post->user_id = $user_id;  
        $post->body = $body;
        $post->ImagePath = $imagePath;
        $post->category_id = $request->category_id;                
        $post->views = 0;
        $post->save();
        $post->tags()->attach($request->tags);
        Notification::send($post->user,new AuthorPost($post));
        event(new PostCreatedEvent($post));
        return redirect()->back()->with('message','Your post are posted successfully !!');
    }

    public function related(User $user)
    {

        $posts = Post::where('user_id',$user->id)->paginate(8);
        if($posts->count() > 0)
            return view('user.related',compact('posts'));

        else
            return redirect()->back()->with('message','Your don\'t have post !! You can create new Post ');
    }

    public function show_category(Request $request)
    {
        $category = $request->category;
        $posts = Category::where('name',$category)->firstOrFail()->posts()->paginate(9)->withQueryString();
         return view('user.blog-category',compact('posts','category'));
    }

    public function show_tag(Request $request)
    {
        $t = $request->tag;
        $tags = Tag::where('name',$t)->get();
        dd($tags);
        // $post_tags = Post::where('id',$t)->firstOrFail()->post_tag()->paginate(9)->withQueryString();
        
        return view('user.blog-tag',compact('post','t'));
    }


    public function users()
    {
        $users = User::all();
        return view('user.users-list',compact('users'));
    }

    public function form(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);
        Mail::to('pauleliote97@gmail.com')->send(new Contact($data));

        return redirect()->back()->with('message','Thank you,we\'ll be in touch soon');
    }


}
