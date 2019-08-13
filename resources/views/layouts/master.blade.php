<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/monster/favicon.png')}}">
	 
		<title>{{ page_title($title ?? '') }}</title> 
	

	<!-- Bootstrap Core CSS -->
	{{-- <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"> --}}
	<link href="{{asset('monster/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="{{asset('monster/dark/css/style.css')}}" rel="stylesheet">
	<!-- You can change the theme colors from here -->
	<link href="{{asset('monster/dark/css/colors/megna-dark.css')}}" id="theme" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	@stack('styles') {{-- @push('styles') @endpush --}}
</head>

<body class="fix-header fix-sidebar card-no-border">
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> 
		</svg>
	</div>

	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<div id="main-wrapper">
		@if(Auth::guard('admin')->check())
			{{-- Logout form --}}
			<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;"> @csrf </form>
			<!-- ============================================================== -->
			<!-- Topbar header - style you can find in pages.scss -->
			<!-- ============================================================== -->
			@include('layouts/partials/_topToolbarAdmin')
			<!-- ============================================================== -->
			<!-- Left Sidebar - style you can find in sidebar.scss  -->
			<!-- ============================================================== -->
			@include('layouts/partials/_leftSidebarAdmin')
		@endif

		@if(Auth::guard('encryptor')->check())
			<form id="logout-form" action="{{ route('encryptor.logout') }}" method="POST" style="display: none;"> @csrf </form>
			@include('layouts/partials/_topToolbarEncryptor')
			@include('layouts/partials/_leftSidebarEncryptor')
		@endif

		@if(Auth::guard('enseignant')->check())
			<form id="logout-form" action="{{ route('teacher.logout') }}" method="POST" style="display: none;"> @csrf </form>
			@include('layouts/partials/_topToolbarTeacher')
			@include('layouts/partials/_leftSidebarTeacher')
		@endif


		@if(Auth::guard('etudiant')->check())
			<form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;"> @csrf </form>
			@include('layouts/partials/_topToolbarStudent')
			@include('layouts/partials/_leftSidebarStudent')
		@endif
		<!-- Page wrapper  -->
		<div class="page-wrapper">

			@yield('content')

			<!-- footer -->
			<footer class="footer">
				© 2019 Scolar-soft
			</footer>
			
		</div>
		<!-- End Page wrapper  -->
	</div>
	<!-- End Wrapper -->

	<!-- All Jquery -->
	<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="{{asset('monster/assets/plugins/bootstrap/js/tether.min.js')}}"></script>
	<script src="{{asset('js/popper.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<!-- slimscrollbar scrollbar JavaScript -->
	<script src="{{asset('monster/dark/js/jquery.slimscroll.js')}}"></script>
	<!--Wave Effects -->
	<script src="{{asset('monster/dark/js/waves.js')}}"></script>
	<!--Menu sidebar -->
	<script src="{{asset('monster/dark/js/sidebarmenu.js')}}"></script>
	<!--stickey kit -->
	<script src="{{asset('monster/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
	<!--Custom JavaScript -->
	<script src="{{asset('monster/dark/js/custom.min.js')}}"></script>
	<!-- ============================================================== -->
	<!-- Style switcher -->
	<!-- ============================================================== -->
	<script src="{{asset('monster/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>

	{{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script> --}}
	<!-- Flashy -->
	@include('flashy::message')

	<!-- FontAwesome -->
	<script src="https://kit.fontawesome.com/360b1a6ac0.js"></script>

	@stack('scripts') {{-- @push('scripts') @endpush --}}
</body>

</html>