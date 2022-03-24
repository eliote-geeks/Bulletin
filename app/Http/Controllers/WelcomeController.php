<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $recent_posts = Post::latest()->take(8)->get();
        $categories = Category::all();
        $tags = Tag::all();
        if($request->search)
        {
            $posts = Post::where('title','like','%' .$request->search. '%')
            ->orWhere('title','like','%' .$request->search. '%')
            ->orWhere('body','like','%' .$request->search. '%')
            ->latest()->get();
            //Last Post  search = %ost%
        }
        else
        {
             $posts = Post::where('views','>','1')->orderBy('views','desc')->take(8)->get();
        }
        return view('user.index',compact('posts','categories','recent_posts','tags'));
    }

}
