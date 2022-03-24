<!DOCTYPE html>
<html lang="en">
<base href="/public">


<head>
	<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Geeks is a fully responsive and yet modern premium bootstrap template. Geek is feature-rich components and beautifully designed pages that help you create the best possible website and web application projects." />
<meta name="keywords" content="Geeks UI, bootstrap, bootstrap 5, Course, Sass, landing, Marketing, admin themes, bootstrap admin, bootstrap dashboard, ui kit, web app, multipurpose" />




<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon/favicon.ico')}}">


<!-- Libs CSS -->
<link href="assets/fonts/feather/feather.css" rel="stylesheet">
<link href="assets/libs/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
<link href="assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
<link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
<link href="assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
<link href="assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
<link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="assets/libs/prismjs/themes/prism-okaidia.css" rel="stylesheet">







<!-- Theme CSS -->
<link rel="stylesheet" href="assets/css/theme.min.css">
	<title>Bulletin | Geeks </title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-default">
	<div class="container-fluid px-0">
		<a class="navbar-brand" 
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
						class="nav-link "
						href="{{ route('semestry.register') }}"
						id="navbarLanding"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						Semestry
					</a>
				</li>
				<li class="nav-item dropdown">
					<a
						class="nav-link"
						href="{{ route('ue.register') }}"
						id="navbarPages"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						Ue
					</a>

				</li> 

				<li class="nav-item dropdown">
					<a
						class="nav-link "
						href="{{ route('note.register') }}"
						id="navbarPages"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
					Notes
					</a>
				</li>    

                				<li class="nav-item dropdown">
					<a
						class="nav-link "
						href="{{ route('student.register') }}"
						id="navbarPages"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
					Student
					</a>

				</li>              

				    @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
							<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

              <a class="btn-sm btn-primary" href="{{ url('/dashboard') }}">
	                {{ (__(auth()->user()->name)	) }}
                </a>
		</nav>       
                        
                    @else

					 <div class="ms-auto mt-9 mt-lg-0 " style="display:flex;">
				<a href="{{route('login')}}" class="btn btn-white shadow-sm me-1" style="height:100%;">Connexion</a>
				<a href="{{route('register')}}" class="btn btn-primary">Inscription</a>
			</div>
								
                    @endauth
                </div>
            @endif

			</ul>



		</div>
	</div>
</nav>
	<!-- Page content -->
	<div class="container d-flex flex-column">
		<div class="row align-items-center justify-content-center g-0 min-vh-100">
			<div class="col-lg-5 col-md-8 py-8 py-xl-0">

            @yield('content')
         	</div>
		</div>
	</div>

	<!-- Scripts -->
	<!-- Libs JS -->
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/odometer/odometer.min.js"></script>
<script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
<script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="assets/libs/quill/dist/quill.min.js"></script>
<script src="assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
<script src="assets/libs/dragula/dist/dragula.min.js"></script>
<script src="assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="assets/libs/jQuery.print/jQuery.print.js"></script>
<script src="assets/libs/prismjs/prism.js"></script>
<script src="assets/libs/prismjs/components/prism-scss.min.js"></script>
<script src="assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
<script src="assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
<script src="assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="assets/libs/typed.js/lib/typed.min.js"></script>
<script src="assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="assets/libs/jsvectormap/dist/maps/world.js"></script>
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
<script src="assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
<script>
	document.getElementById('print').addEventListener('click',()=>{
		window.print();		
	});
</script>





<!-- Theme JS -->
<script src="assets/js/theme.min.js"></script>
</body>



</html>