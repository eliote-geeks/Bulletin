<!DOCTYPE html>
<html lang="en">

<base href="/public">
@include('user.css')
<body>
  <!-- Page content -->
  <div class="bg-white">
    <!-- navbar login -->
@include('user.navbar')

    <!-- Content -->
    <div class="py-4 py-lg-8 pb-14 ">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 col-lg-8 col-md-12 col-12 mb-2">
            <div class="text-center mb-4">
            <h6 class="text-sm">Total Views: {{$post->views}}</h6>
              <a href="{{route('blog-category.show_category',['category' => $post->category->name])}}" class="fs-5 fw-semi-bold d-block mb-4 text-primary">{{$post->category->name}}</a>
              <h1 class="display-3 fw-bold mb-4">{{$post->title}}</h1>
              <span class="mb-3 d-inline-block">{{$post->created_at->diffForHumans() }} read</span>
            </div>
            <!-- Media -->
            <div class="d-flex justify-content-between align-items-center mb-5">
              <div class="d-flex align-items-center">
              <u><span>Autor: </span></u>
                {{-- <img src="../assets/images/avatar/avatar-4.jpg" alt="" class="rounded-circle avatar-md"> --}}
                <div class="ms-2 lh-1">
                  <h5 class="mb-1 ">{{ $post->user->name }}</h5>
                  <span class="text-primary">{{ $post->user->email }}</span>
                </div>
              </div>
              <div>
                <span class="ms-2 text-muted">Share</span>
                <a href="#" class="ms-2 text-muted"><i class="fab fa-facebook"></i></a>
                <a href="#" class="ms-2 text-muted"><i class="fab fa-twitter"></i></a>
                <a href="#" class="ms-2 text-muted "><i class="fab fa-linkedin"></i></a><br>
                    @auth
                    @if((auth()->user()->id == $post->user->id ) ||( auth()->user()->rank == 1))                      
                <a href="{{ route('blog.edit',$post) }}" class="ms-2 text-muted ">Edit</a>
                <a href="{{ route('blog.delete',$post) }}" onclick="return(confirm('Are you sure to delete this post ?? '))" class="ms-2 text-muted ">Delete</a>                      
                    @endif
                @endauth
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- Image -->
          <div class="col-xl-10 col-lg-10 col-md-12 col-12 mb-6">
            <img src="{{$post->imagePath}}" alt="{{$post->title}}" class="img-fluid rounded-3">
          </div>
        </div>
        










        <div class="row justify-content-center">
          {!!$post->body !!}
        </div>


















      </div>
      <!-- Container -->
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-12">
              <h2 class="title">Tags</h2>
              @forelse ($post->tags as $tag)
                  <a href="{{ route('blog-tag.show_tag',['tag' => $tag->name]) }}" class="btn btn-info btn-xs mb-2 btn-center">{{$tag->name}}</a>
                  @empty
                  <span>No tag yet!!</span>
              @endforelse
            <div class="my-5">
              <h2>Related Post</h2><br>
            </div>
          </div>
    @foreach ($posts as $last)
          <div class="col-xl-4 col-lg-4 col-md-6 col-12">
            <!-- Card -->
            <div class="card mb-4 shadow-lg ">
              <a href="{{route('blog-single.show',$last)}}" class="card-img-top"> <img src="{{ $last->imagePath}}" class="card-img-top rounded-top-md"
                  alt=""></a>
              <!-- Card body -->
              <div class="card-body">
                <a href="{{route('blog-category.show_category',['category' => $last->category->name])}}" class="fs-5 fw-semi-bold d-block mb-3 text-primary">{{$last->category->name}}</a>
                <a href="{{route('blog-single.show',$last)}}">
                  <h3>{{$last->title}}</h3>
                </a>
                <p>{!! Str::words($last->body,10) !!}
                </p>
                <!-- Media content -->
                <div class="row align-items-center g-0 mt-4">
                  <div class="col-auto">
                    {{-- <img src="../assets/images/avatar/avatar-1.jpg" alt="" class="rounded-circle avatar-sm me-2"> --}}
                  </div>
                  <div class="col lh-1">
                    <h5 class="mb-1">{{$last->user->name}}</h5>
                    <p class="fs-6 mb-0">{{$last->created_at->diffForHumans()}}</p>
                  </div>
                  <div class="col-auto">
                    {{-- <p class="fs-6 mb-0">12 Min Read</p> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
    @endforeach          

        </div>
      </div>
    </div>

  <!-- Footer -->
  <!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row align-items-center g-0 border-top py-2">
            <!-- Desc -->
            <div class="col-md-6 col-12 text-center text-md-start">
                <span>© 2021 Geeks. All Rights Reserved.</span>
            </div>
              <!-- Links -->
            <div class="col-12 col-md-6">
                <nav class="nav nav-footer justify-content-center justify-content-md-end">
                    <a class="nav-link active ps-0" href="#">Privacy</a>
                    <a class="nav-link" href="#">Terms </a>
                    <a class="nav-link" href="#">Feedback</a>
                    <a class="nav-link" href="#">Support</a>
                </nav>
            </div>
        </div>
    </div>
</div>

  </div>
@include('user.script')
</body>

</html>