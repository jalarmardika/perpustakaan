<!DOCTYPE html>
<html>
<head>
	<title>LibraryApp</title>
	<link href="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css') }}" rel="stylesheet">
	<link href="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
	<style type="text/css">
		.print{
			display: none;
		}
		@media print {
			.card {
				border: none;
			}
			.card-body {
				padding: 0px;
			}
			.no-print {
			display: none !important;
			}
			.print{
				display: inherit !important;
			}
		}
	</style>
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
		            <ul class="navbar-nav ml-auto">
			            <!-- Nav Item - User Information -->
	                    <li class="nav-item dropdown no-arrow">
	                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
	                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
	                            <img class="img-profile rounded-circle"
                                    src="{{ url('startbootstrap-sb-admin-2-gh-pages/img/undraw_profile.svg') }}">
	                        </a>
	                        <!-- Dropdown - User Information -->
	                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
	                            aria-labelledby="userDropdown">
	                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalProfile">
	                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
	                                Edit Profile
	                            </a>
	                            <a class="dropdown-item" onclick="return confirm('Are you sure ?')" href="{{ url('logout') }}">
	                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
	                                Logout
	                            </a>
	                        </div>
	                    </li>
                    </ul>
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

	<!-- modal profile -->
	<div class="modal" tabindex="-1" id="modalProfile">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Profile</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="{{ url('editProfile/' . auth()->user()->id) }}" method="post">
						@csrf
						@method('put')
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" autocomplete="off" value="{{ old('email', auth()->user()->email) }}">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" placeholder="Fill in if you want to change the password">
						</div>
						<div class="d-flex justify-content-end">
							<button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button>
						</div>
					</form>
				</div>
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