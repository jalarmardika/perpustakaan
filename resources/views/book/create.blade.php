@extends('template.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h2>Add Book</h2>
</div>
<div class="row">
	<div class="col-md-8">
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
				<form action="{{ url('book') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control" value="{{ old('title') }}" autofocus>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>ISBN</label>
								<input type="number" name="isbn" class="form-control" value="{{ old('isbn') }}" autocomplete="off">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Issued</label>
								<input type="date" name="issued" class="form-control" value="{{ old('issued') }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Author</label>
								<input type="text" name="author" class="form-control" value="{{ old('author') }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Publisher</label>
								<input type="text" name="publisher" class="form-control" value="{{ old('publisher') }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label>Location</label>
								<input type="text" name="location" class="form-control" value="{{ old('location') }}" placeholder="Optional">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Stock</label>
								<input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>Image <em>(Optional)</em></label>
								<input type="file" name="image" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="description" class="form-control" placeholder="Optional">{{ old('description') }}</textarea>
					</div>
					<div class="d-flex justify-content-end">
						<a href="{{ url('book') }}" class="btn btn-secondary text-gray btn-sm mr-1">Back</a>
						<button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection