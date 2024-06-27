@extends('template.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h2>Books</h2>
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
			    <h6 class="m-0 font-weight-bold text-primary">Data Books</h6>
			</a>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="collapseCardExample">
				<div class="card-body">
					<a href="{{ url('book/create') }}" class="btn btn-outline-primary btn-sm mb-3">Add Book</a>
					<table id="dataTable" class="table table-bordered table-hover table-striped table-responsive">
						<thead>
							<tr>
								<th width="1%">No</th>
								<th>Title</th>
								<th>ISBN</th>
								<th>Issued</th>
								<th class="text-center">Stock</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($books as $book)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $book->title }}</td>
								<td>{{ $book->isbn }}</td>
								<td>{{ date('d-m-Y', strtotime($book->issued)) }}</td>
								<td class="text-center">{{ number_format($book->stock) }}</td>
								<td>
									<a href="{{ url('book/'. $book->id) }}" class="btn btn-outline-success btn-sm">Detail</a>
									<a href="{{ url('book/'. $book->id .'/edit') }}" class="btn btn-outline-warning btn-sm">Edit</a>
									<form action="{{ url('book/'. $book->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure ?')">
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