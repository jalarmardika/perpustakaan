@extends('template.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h2>Detail Book</h2>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card mb-4">
			<div class="card-body">
				<div class="row">
				  <div class="col-md-4">
				    <img src="{{ url('storage/' . $book->image) }}" class="img-fluid mb-3">
				  </div>
				  <div class="col-md-8">
				    <ul class="list-group">
				      <li class="list-group-item"><b>Title : </b>{{ $book->title }}</li>
				      <li class="list-group-item"><b>ISBN : </b>{{ $book->isbn }}</li>
				      <li class="list-group-item"><b>Issued : </b>{{ date('d-m-Y', strtotime($book->issued)) }}</li>
				      <li class="list-group-item"><b>Author : </b>{{ $book->author }}</li>
				      <li class="list-group-item"><b>Publisher : </b>{{ $book->publisher }}</li>
				      <li class="list-group-item"><b>Location : </b>{{ $book->location }}</li>
				      <li class="list-group-item"><b>Stock : </b>{{ $book->stock }}</li>
				      <li class="list-group-item"><b>Description : </b>{{ $book->description }}</li>
				    </ul>
				  </div>
				</div>
				<div class="d-flex justify-content-end">
					<a href="{{ url('book') }}" class="btn btn-secondary text-gray btn-sm mt-3">Back</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection