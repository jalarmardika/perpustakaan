@extends('template.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h2>Edit Member</h2>
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
				<form action="{{ url('member/' . $member->id) }}" method="post">
					@csrf
					@method('put')
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" value="{{ old('name', $member->name) }}" autofocus>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>NIM</label>
								<input type="number" name="nim" class="form-control" value="{{ old('nim', $member->nim) }}" autocomplete="off">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Gender</label><br>
								@if($member->gender == 'Male') 
									<label><input type="radio" name="gender" value="Male" checked> Male</label>
								@else	
									<label><input type="radio" name="gender" value="Male"> Male</label>
								@endif

								@if($member->gender == 'Female') 
									<label><input type="radio" name="gender" value="Female" checked> Female</label>
								@else	
									<label><input type="radio" name="gender" value="Female"> Female</label>
								@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Study Program</label>
								<input type="text" name="study_program" class="form-control" value="{{ old('study_program', $member->study_program) }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>No Handphone</label>
								<input type="number" name="no_hp" class="form-control" value="{{ old('no_hp', $member->no_hp) }}">
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-end">
						<a href="{{ url('member') }}" class="btn btn-secondary text-gray btn-sm mr-1">Back</a>
						<button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection