<nav class="navbar navbar-expand-lg navbar-default">
	<div class="container-fluid px-0">
		<a class="navbar-brand" href="{{route('welcome.index')}}"
			><img src="{{asset('images/brand/logo/logo.svg')}}" alt=""
		/></a>

		<!-- Button -->
		<button
			class="navbar-toggler collapsed"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbar-default"
			aria-controls="navbar-default"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
			<span class="icon-bar top-bar mt-0"></span>
			<span class="icon-bar middle-bar"></span>
			<span class="icon-bar bottom-bar"></span>
		</button>
		<!-- Collapse -->
		<div class="collapse navbar-collapse" id="navbar-default">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a
						class="nav-link home"
						href="{{route('welcome.index')}}"
						id="navbarBrowse"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
						data-display="static"
					>
						Home
					</a>
			</li>
				<li class="nav-item dropdown">
					<a
						class="nav-link  "					
						href="{{route('index-blog.index')}}"
					>
						Blog
					</a>
				</li>
					{{-- {{Request::routeIs('index-blog.index')}}' ? 'active' : '' --}}
				<li class="nav-item dropdown">
					<a
						class="nav-link "
						href="{{url('/about')}}"
						id="navbarLanding"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						About
					</a>
				</li>
				<li class="nav-item dropdown">
					<a
						class="nav-link "
						href="{{url('/contact')}}"
						id="navbarPages"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						Contact
					</a>

						</div>
					</div>
				</li>

			</ul>


@if(Route::has('login'))
	@auth
		<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
			 {{-- <x-app-layout>
              </x-app-layout> --}}
			  {{-- <a href="{{ route('dashboard') }}" class="btn-sm btn-primary"> Profile</a> --}}				
              <a class="btn-sm btn-primary" href="{{ route('profile.show') }}">
			  			
	                {{ Str::limit(__(auth()->user()->name),6) }}
                </a>
		</nav>
		
	@endauth
@endif
@guest
 <div class="ms-auto mt-9 mt-lg-0 " style="display:flex;">
				<a href="{{url('/login')}}" class="btn btn-white shadow-sm me-1" style="height:100%;">Connexion</a>
				<a href="{{url('/register')}}" class="btn btn-primary">Inscription</a>
			</div>
@endguest

		</div>
	</div>
</nav>