<!DOCTYPE html>
<html lang="en">


<base href="/public">
@include('user.css')
<body>
	<!-- Page content -->
	<div class="bg-white">
		<!-- navbar login -->
@include('user.navbar')

		<!-- Page header -->
		<div class="pt-9 pb-9">
			<div class="container">
				<div class="row">
					<div class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 col-md-12 col-12">
						<div class="text-center mb-5">
							<h1 class="display-2 fw-bold">{{$category}}</h1>
							<p class="lead">
								Our features, journey, tips and us being us. Lorem ipsum dolor
								sit amet, accumsan in, tempor dictum neque.
							</p>
						</div>
						<!-- Form -->
						<form class="row px-md-20">
							<div class="mb-3 col ps-0 ms-2 ms-md-0">
								<input type="email" class="form-control" placeholder="Email Address" required="" />
							</div>
							<div class="mb-3 col-auto ps-0">
								<button class="btn btn-primary" type="submit">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Page Content -->
		<div class="pb-12">
			<div class="container">
				<div class="row">
@forelse ($posts as $post)
						<div class="col-xl-4 col-lg-4 col-md-6 col-12">
						<!-- Card -->
						<div class="card mb-4 shadow-lg ">
							<a href="{{route('blog-single.show',$post)}}"  class="card-img-top">
								<img src="{{asset($post->imagePath)}}" class="card-img-top rounded-top-md" alt="" /></a>
							<!-- Card body -->
							<div class="card-body">
								 <a href="/" class="fs-5 fw-semi-bold d-block mb-3 text-danger">{{$post->category->name}}</a>
								<h3>
									<a href="{{route('blog-single.show',$post)}}" class="text-inherit">
										{{$post->title}}
									</a>
								</h3>
								<p>
								{!! Str::words($post->body,10) !!}
								</p>
								<!-- Media content -->
								<div class="row align-items-center g-0 mt-4">
									<div class="col-auto">
										{{-- <img src="../assets/images/avatar/avatar-7.jpg" alt="" class="rounded-circle avatar-sm me-2" /> --}}
									</div>
									<div class="col lh-1">
										<h5 class="mb-1">{{$post->user->name}}</h5>
										<p class="fs-6 mb-0">{{$post->created_at->diffForHumans()}}</p>
									</div>
									<div class="col-auto">
										{{-- <p class="fs-6 mb-0">20 Min Read</p> --}}
									</div>
								</div>
							</div>
						</div>
					</div>	
					@empty
					<p>No posts yet!!</p>
@endforelse

   <!-- Buttom -->
          <div class="col-xl-12 col-lg-12 col-md-12 col-12 text-center mt-4">
               {{$posts->links() }}

          </div>



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