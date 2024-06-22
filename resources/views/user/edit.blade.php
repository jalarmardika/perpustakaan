@extends('template.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h2>Edit User</h2>
</div>
<div class="row">
	<div class="col-md-6">
		@if($errors->any())
		<div class="alert alert-danger">
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
		<div class="card mb-4">
			<div class="card-body">
				<form action="{{ url('user/' . $user->id) }}" method="post">
					@csrf
					@method('put')
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" autofocus>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" placeholder="Fill in if you want to change the password">
					</div>
					<div class="form-group">
						@if($user->is_admin)
							<label><input type="checkbox" name="is_admin" checked> Is Admin</label>
						@else	
							<label><input type="checkbox" name="is_admin"> Is Admin</label>
						@endif
					</div>
					<div class="d-flex justify-content-end">
						<a href="{{ url('user') }}" class="btn btn-secondary text-gray btn-sm mr-1">Back</a>
						<button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection