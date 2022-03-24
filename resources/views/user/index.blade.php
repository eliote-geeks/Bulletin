<!DOCTYPE html>
<html lang="en">
<base url="/public">

@include('user.css')
<body>
  <!-- Page content -->
  <div class="bg-white">
  @include('user.navbar')
    <!-- Page header -->
    <div class="pt-9 pb-9 ">
      <div class="container">
        <div class="row ">
          <div class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 col-md-12 col-12">
            <div class="text-center mb-5">
                  @if(session()->has('delete'))
            <p class="alert alert-success">{{ session()->get('delete') }}</p>
            @endif
              <h1 class=" display-2 fw-bold">Geeks Newsroom</h1>
              <p class=" lead">
              {{-- <x-newFirstComponment name="paul eliote" :author="$posts" class="text-green-500" >
              <x-slot name="subtitle">Mon super sous-titre</x-slot>
              <div>bonjor lwa</div>
               </x-newFirstComponment>  --}}
                Stories, tips, and tools to inspire you to find your most creative self. Subscribe to get curated content delivered directly to your inbox.
              </p>
            </div>
            <!-- Form -->
            <form class="row px-md-20">
              <div class="mb-3 col ps-3">
                <input type="email" class="form-control" placeholder="Email Address" required="">
              </div>
              <div class="mb-3 col-auto ps-0">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Content -->
    <div class="pb-16">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-7 col-12">
                <h2 class="text-lg">Popular Posts</h2>
                <div class="row">
        @forelse ($posts as $post)    
                    <div class=" col-lg-6 col-md-12 col-12">
                      <!-- Card -->
                      <div class="card mb-4  shadow-lg">
                        <a href="{{route('blog-single.show',$post)}}" class="card-img-top">
                              <!-- Img  -->
                          <img src="{{asset($post->imagePath)}}" class="card-img-top rounded-top-md" alt=""></a>
                        <!-- Card body -->
                        <div class="card-body">
                          <a href="{{route('blog-category.show_category',['category'=>$post->category->name])}}" class="fs-5 mb-2 fw-semi-bold d-block text-success">{{$post->category->name}}</a>
                          <h3><a href="{{route('blog-single.show',$post)}}" class="text-inherit">
                              {{Str::title($post->title)}} 
                            </a>
                          </h3>
                          <p> {!! Str::limit($post->body, 80) !!} </p> 
                          <!-- Media content -->
                          <div class="row align-items-center g-0 mt-4">
                            <div class="col-auto">
                              {{-- <img src="{{asset($post->imagePath)}}" alt="" class="rounded-circle avatar-sm me-2"> --}}
                            </div>
                            <div class="col lh-1">
                            <h6 align="right" class="text-sm fe fe-info"> Total Views: {{$post->views}}</h6>
                              <h5 class="mb-1">{{$post->user->name}}</h5>
                              <p class="fs-6 mb-0 fe fe-clock"> {{$post->created_at->diffForHumans()}}</p>
                            </div>
                          </div>
                          <br>
                @auth
                    @if((auth()->user()->id == $post->user->id ) ||( auth()->user()->rank == 1))                      
                <a href="{{ route('blog.edit',$post) }}" class="btn-sm btn-info">Edit</a>
                <a href="{{ route('blog.delete',$post) }}" onclick="return(confirm('Are you sure to delete this post ?? '))" class="btn-sm btn-danger">Delete</a>                      
                    @endif
                @endauth
                        </div>
                      </div>
                    </div>
                    @empty
                    <p>Sorry, currently there is no blog post related to that search</p
        @endforelse

  

                    <!-- Buttom -->

                  </div>
              </div>
              <div class="col-lg-4 col-md-5 col-12 mt-6 mt-md-0">
                <!-- search -->
                <div class="mb-4">
                  <div class="mb-3 position-relative">
                  <form method="get">
                    <input type="search" class="form-control " name="search" placeholder="Search...">
                    <span class="position-absolute end-0 top-0 my-3  me-4 "><i class="bi bi-search fs-5"></i></span>
                  </form>
                  </div>
                </div>
                <!-- card -->
                <div class="card mb-4 border ">
                  <!-- card body -->
                  <div class="card-body p-4">
                    <h3>Recent Posts</h3>
                    <div class="mt-3">
                      <!-- list -->
                      <ul class="list-unstyled mb-0">
@foreach ($recent_posts as $post)
                        <li class="mb-3">
                          <h4 class="lh-lg"><a href="{{route('blog-single.show',$post)}}" class="text-inherit">
                            {{$post->title}}.</a></h4>
                        </li>
@endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card mb-4 border ">
                  <!-- card body -->
                  <div class="card-body p-4">
                    <h3>Categories</h3>
                    <div class="mt-3">
                      <!-- list -->
                      <ul class="list-unstyled mb-0 nav nav-x-0 flex-column">
                            @foreach ($categories as $category)
                        <li class="lh-lg mb-1">
                          <i class="fe fe-arrow-right text-muted"></i>
                          <a href="{{route('blog-category.show_category',['category' => $category->name])}}" class="text-link d-inline">
                            {{$category->name}}</a>
                        </li>
                      @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card mb-4 border ">
                  <!-- card body -->
                  <div class="card-body p-4">
                    <h3>Archive</h3>
                    <div class="mt-3">
                      <!-- list -->
                      <ul class="list-unstyled mb-0 nav nav-x-0 flex-column">
                        <li class="lh-lg mb-1">

                          <i class="fe fe-arrow-right text-muted"></i>
                          <a href="#" class="text-link d-inline">
                            March 2021</a>
                        </li>
                        <li class="lh-lg mb-1">
                          <i class="fe fe-arrow-right text-muted"></i>
                          <a href="#" class="text-link d-inline">
                            February 2021</a>
                        </li>
                        <li class="lh-lg mb-1">
                          <i class="fe fe-arrow-right text-muted"></i>
                          <a href="#" class="text-link d-inline">
                            January 2021</a>
                        </li>
                        <li class="lh-lg mb-1">
                          <i class="fe fe-arrow-right text-muted"></i>
                          <a href="#" class="text-link d-inline">
                            December 2020</a>
                        </li>

                      </ul>
                    </div>
                  </div>
                </div>
                  <!-- card -->
                  <div class="card mb-4 border ">
                    <!-- card body -->
                    <div class="card-body p-4">
                      <h3>Tags</h3>
                      <div class="mt-3">
                      @foreach ($tags as $tag)
                       <a href="" class="btn btn-light btn-xs mb-2">{{$tag->name}}</a>                          
                      @endforeach
                      </div>
                    </div>
                  </div>
              </div>
          </div>

      </div>
    </div>

  <!-- Footer -->
      <!-- footer -->
    <div class="pt-lg-10 pt-5 footer bg-white">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                  <!-- about company -->
              <div class="mb-4">
                <img src="assets/images/brand/logo/logo.svg" alt="">
                <div class="mt-4">
                  <p>Geek is feature-rich components and beautifully Bootstrap UIKit for developers, built with bootstrap responsive framework.</p>
                     <!-- social media -->
                  <div class="fs-4 mt-4">
                    <a href="#" class="mdi mdi-facebook text-muted me-2"></a>
                    <a href="#" class="mdi mdi-twitter text-muted me-2"></a>
                    <a href="#" class="mdi mdi-instagram text-muted "></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="offset-lg-1 col-lg-2 col-md-3 col-6">
              <div class="mb-4">
                    <!-- list -->
                <h3 class="fw-bold mb-3">Company</h3>
                <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                  <li><a href="#" class="nav-link">About</a></li>
                  <li><a href="#" class="nav-link">Pricing</a></li>
                  <li><a href="#" class="nav-link">Blog</a></li>
                  <li><a href="#" class="nav-link">Careers</a></li>
                  <li><a href="#" class="nav-link">Contact</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
              <div class="mb-4">
                    <!-- list -->
                <h3 class="fw-bold mb-3">Support</h3>
                <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                  <li><a href="#" class="nav-link">Help and Support</a></li>
                  <li><a href="#" class="nav-link">Become Instructor</a></li>
                  <li><a href="#" class="nav-link">Get the app</a></li>
                  <li><a href="#" class="nav-link">FAQ’s</a></li>
                  <li><a href="#" class="nav-link">Tutorial</a></li>
                </ul>

              </div>
            </div>
            <div class="col-lg-3 col-md-12">
                  <!-- contact info -->
              <div class="mb-4">
                <h3 class="fw-bold mb-3">Get in touch</h3>
                <p>339 McDermott Points Hettingerhaven, NV 15283</p>
                <p class="mb-1">Email: <a href="#">support@geeksui.com</a></p>
                <p>Phone: <span class="text-dark fw-semi-bold">(000) 123 456 789</span></p>

              </div>
            </div>
          </div>
          <div class="row align-items-center g-0 border-top py-2 mt-6">
            <!-- Desc -->
            <div class="col-lg-4 col-md-5 col-12">
                <span>© 2021 Geeks-UI, Inc. All Rights Reserved</span>
                </div>

              <!-- Links -->
            <div class="col-12 col-md-7 col-lg-8 d-md-flex justify-content-end">
                <nav class="nav nav-footer">
                    <a class="nav-link ps-0" href="#">Privacy Policy</a>
                    <a class="nav-link px-2 px-md-3" href="#">Cookie Notice  </a>
                    <a class="nav-link d-none d-lg-block" href="#">Do Not Sell My Personal Information </a>
                    <a class="nav-link" href="#">Terms of Use</a>
                </nav>
            </div>
        </div>
        </div>
      </div>

</div>

@include('user.script')
</body>

</html>