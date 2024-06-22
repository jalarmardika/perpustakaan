@extends('template.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h2>Edit Book</h2>
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
				<form action="{{ url('book/' . $book->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('put')
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control" value="{{ old('title', $book->title) }}" autofocus>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>ISBN</label>
								<input type="number" name="isbn" class="form-control" value="{{ old('isbn', $book->isbn) }}" autocomplete="off">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Issued</label>
								<input type="date" name="issued" class="form-control" value="{{ old('issued', $book->issued) }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Author</label>
								<input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Publisher</label>
								<input type="text" name="publisher" class="form-control" value="{{ old('publisher', $book->publisher) }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label>Location</label>
								<input type="text" name="location" class="form-control" value="{{ old('location', $book->location) }}" placeholder="Optional">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Stock</label>
								<input type="number" name="stock" class="form-control" value="{{ old('stock', $book->stock) }}">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>Image 
									<em>(Optional)</em>
									@if($book->image != "") 
										<a href="#" data-toggle="modal" data-target="#modalImage">view</a>
									@endif	
								</label>
								<input type="file" name="image" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="description" class="form-control" placeholder="Optional">{{ old('description', $book->description) }}</textarea>
					</div>
					<div class="d-flex justify-content-end">
						<a href="{{ url('book') }}" class="btn btn-secondary text-gray btn-sm mr-1">Back</a>
						<button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- modal add -->
<div class="modal" tabindex="-1" id="modalImage">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">View Image</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<center>
					<img src="{{ url('storage/' . $book->image) }}" class="img-fluid w-100 mb-3">
				</center>
			</div>
		</div>
	</div>
</div>
@endsection