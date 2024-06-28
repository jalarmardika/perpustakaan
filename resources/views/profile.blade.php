@extends('template.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h2>Edit Profile</h2>
</div>
<div class="row">
	<div class="col-md-6">
		@if(session()->has('success'))
		<div class="alert alert-success">
			<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			{{ session('success') }}
		</div>
		@endif

		@if($errors->any())
		<div class="alert alert-danger no-print">
			<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="card shadow no-print mb-2">
			<div class="card-body">
				<form action="{{ url('profile/' . auth()->user()->id) }}" method="post">
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
@endsection