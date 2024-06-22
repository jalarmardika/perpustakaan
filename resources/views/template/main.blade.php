<!DOCTYPE html>
<html>
<head>
	<title>LibraryApp</title>
	<link href="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css') }}" rel="stylesheet">
	<link href="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
	<div id="wrapper">
		@include('template.sidebar')

		<div id="content-wrapper" class="d-flex flex-column">
		    <!-- Main Content -->
		    <div id="content">
		        <!-- Topbar -->
		        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
		            <!-- Sidebar Toggle (Topbar) -->
		            <a class="nav-link"id="sidebarToggle" href="#" role="button"><i class="fas fa-bars"></i></a>
		            <p class="float-right text-muted mt-2 ml-auto">
	            		<!--  -->
		            </p>
		        </nav>

		        <div class="container-fluid">
		        	@yield('content')
	        	</div>

		        <a class="scroll-to-top rounded" href="#page-top">
		        	<i class="fas fa-angle-up"></i>
		        </a>
		    </div>
	    </div>
	</div>

		<!-- Bootstrap core JavaScript-->
		<script src="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

		<!-- Core plugin JavaScript-->
		<script src="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

		<!-- Custom scripts for all pages-->
		<script src="{{ url('startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js') }}"></script>

	    <!-- Page level plugins -->
	    <script src="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/datatables/jquery.dataTables.min.js') }}"></script>
	    <script src="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

	    <!-- Page level custom scripts -->
	    <script src="{{ url('startbootstrap-sb-admin-2-gh-pages/js/demo/datatables-demo.js') }}"></script>
</body>
</html>