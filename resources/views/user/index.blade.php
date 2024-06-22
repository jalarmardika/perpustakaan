@extends('template.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h2>Users</h2>
</div>
<div class="row">
	<div class="col-md-12">
		@if(session()->has('success'))
		<div class="alert alert-success">
			<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			{{ session('success') }}
		</div>
		@elseif(session()->has('fail'))
		<div class="alert alert-danger">
			<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			{{ session('fail') }}
		</div>
		@endif

		<div class="card shadow mb-5">
			<!-- Card Header - Accordion -->
			<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
			    role="button" aria-expanded="true" aria-controls="collapseCardExample">
			    <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
			</a>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="collapseCardExample">
				<div class="card-body">
					<a href="{{ url('user/create') }}" class="btn btn-outline-primary btn-sm mb-3">Add User</a>
					<table id="dataTable" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th width="1%">No</th>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>
									@if($user->is_admin)
										Admin
									@else
										User
									@endif
								</td>
								<td>
									<a href="{{ url('user/'. $user->id .'/edit') }}" class="btn btn-outline-warning btn-sm">Edit</a>
									<form action="{{ url('user/'. $user->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure ?')">
										@csrf
										@method('delete')
										<button type="submit" name="submit" class="btn btn-outline-danger btn-sm">Delete</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>				
				</div>
			</div>
		</div>
	</div>
</div>
@endsection