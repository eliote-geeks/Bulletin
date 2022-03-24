<!DOCTYPE html>
<html lang="en">
<base href="/public">
@include('user.css')
<body>
  <!-- Page content -->
  <div class="bg-white">
  @include('user.navbar')

        <div class="container">
            <div class="row">
                <h1 class="text-center" style="margin-top:15px; text-transform:uppercase;">Edit  Post <span style="font-size:20px;"> {{$post->title}} </span></h1>
                       <form class="row" method="post" enctype="multipart/form-data" action="{{route('blog.update',$post) }}">
                       @method('put')
                       @csrf
            @if(session()->has('message'))
              <span class="alert alert-success">{{ session()->get('message') }}</span>
            @endif
                   <!-- form group -->
                <div class="mb-3 col-12 col-md-6">
                  <label
                    class="form-label"for="fname">Title:<span
                      class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="title" value="{{ $post->title }}"
                    id="fname" placeholder="title"/>
                    @error('title')
                    {{-- The SetAttribute value field is not validated --}}
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                  <!-- form group -->
                <div class="mb-3 col-12 col-md-6">
                  <label class="form-label"for="lname">Image:<span
                      class="text-danger">*</span></label>
                  <input
                    class="form-control"
                    type="file"
                    name="image"
                    id="lname"
                    />
                    <div class="card">
                        <img class="thumbnail" style="border-radius:; width:30%; height:50%;" src="{{asset($post->imagePath)}}">
                    </div>
           @error('image')
                    {{-- The SetAttribute value field is not validated --}}
                    <p style="color:red;">{{ $message }}</p>
             @enderror
                </div>

                  <!-- form group -->
                <div class="mb-3 col-12 col-md-6">
                  <label class="form-label" for="category">Category:<span
                      class="text-danger">*</span></label>
              <select name="category_id" id="category" class="form-control">
                    <option value="{{ $post->category->id }}" selected >{{$post->category->name}}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
              </select>
           @error('category_id')
                    {{-- The SetAttribute value field is not validated --}}
                    <p style="color:red;">{{ $message }}</p>
             @enderror
                </div>
                  <!-- form group -->
                <div class="mb-3 col-12 col-md-12">
                  <label
                    class="form-label"for="email">body:<span
                      class="text-danger">*</span></label>
                    <textarea class="form-control ckeditor" name="body" id="email" placeholder="description" rows="7">
                            {{ $post->body }}
                    </textarea>
             @error('body')
                    {{-- The SetAttribute value field is not validated --}}
                    <p style="color:red;">{{ $message }}</p>
             @enderror
                </div>

                  <!-- form group -->
                <div class="mb-3 col-12 col-md-12">
                  <label class="form-label" for="tag">Tags:<span
                      class="text-danger">*</span></label><br>
                      @foreach ($tags as $tag)
                  <label class="form-label" for="{{ $tag->id }}">{{ $tag->name }}<span
                      class="text-danger"></span></label>                      
                  <input id="{{ $tag->id }}" type="checkbox" value="{{ $tag->id }}" name="tags[]" class="" 
                  @foreach ($post->tags as $t)
                      @if($tag->id === $t->id)
                          checked
                      @endif
                  @endforeach
                  
                  >&nbsp;&nbsp;&nbsp;&nbsp;                          
                      @endforeach
           @error('tag_id')
                    -- The SetAttribute value field is not validated --
                    <p style="color:red;">{{ $message }}</p>
             @enderror
                </div>

                  <!-- button -->
                <div class=" col-12">
                  <button type="submit" class="btn btn-primary btn-block">
                    Submit
                  </button>
                </div>
              </form>
            </div>
        </div>

  </div>
@include('user.script')
</body>

</html>