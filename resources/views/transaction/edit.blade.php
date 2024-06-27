@extends('template.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h2>Edit Transaction</h2>
</div>
<div class="row">
	<div class="col-md-6">
		@if(session()->has('fail'))
		<div class="alert alert-danger">
			<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			{{ session('fail') }}
		</div>
		@endif

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
				<form action="{{ url('transaction/'. $transaction->id) }}" method="post">
					@csrf
					@method('put')
					<input type="hidden" name="book_id" value="{{ old('book_id', $transaction->book_id) }}">
					<input type="hidden" name="member_id" value="{{ old('member_id', $transaction->member_id) }}">
        			<div class="form-group">
    					<label class="control-label">Book <a href="#" data-toggle="modal" data-target="#modalBook"><em>choose</em></a></label>
						<input type="text" name="book" class="form-control" readonly value="{{ old('book', $transaction->book->isbn) }}" style="border-radius: 0%;">
        			</div> 
        			<div class="form-group">
    					<label class="control-label">Member <a href="#" data-toggle="modal" data-target="#modalMember"><em>choose</em></a></label>
						<input type="text" name="member" class="form-control" readonly value="{{ old('member', $transaction->member->nim) }}" style="border-radius: 0%;">
        			</div> 
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Transaction Date</label>
								<input type="date" name="transaction_date" class="form-control" value="{{ old('transaction_date', $transaction->transaction_date) }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Return Date</label>
								<input type="date" name="return_date" class="form-control" value="{{ old('return_date', $transaction->return_date) }}">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Notes</label>
						<textarea name="notes" class="form-control" placeholder="Optional">{{ old('notes', $transaction->notes) }}</textarea>
					</div>
					<div class="form-group">
						<label>Status</label><br>
						<label><input type="radio" name="status" value="borrowed" checked> Borrowed</label>
						<label><input type="radio" name="status" value="returned"> Returned</label>
					</div>
					<div class="d-flex justify-content-end">
						<a href="{{ url('transaction') }}" class="btn btn-secondary text-gray btn-sm mr-1">Back</a>
						<button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal" tabindex="-1" id="modalBook">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Choose Book</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<table id="dataTable" class="table table-bordered table-striped table-hover table-responsive-lg">
					<thead>
						<tr>
							<th width="1%">No</th>
							<th>Title</th>
							<th>ISBN</th>
							<th>Issued</th>
							<th class="text-center">Stock</th>
							<th>#</th>
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
								<a href="#" class="btn btn-outline-success btn-select-book btn-sm" data-id="{{ $book->id }}" data-isbn="{{ $book->isbn }}" data-dismiss="modal">Choose</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal" tabindex="-1" id="modalMember">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Choose Member</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<table id="dataTable" class="table table-bordered table-striped table-hover table-responsive-lg">
					<thead>
						<tr>
							<th width="1%">No</th>
							<th>Name</th>
							<th>NIM</th>
							<th>Study Program</th>
							<th>#</th>
						</tr>
					</thead>
					<tbody>
						@foreach($members as $member)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $member->name }}</td>
							<td>{{ $member->nim }}</td>
							<td>{{ $member->study_program }}</td>
							<td>
								<a href="#" class="btn btn-outline-success btn-select-member btn-sm" data-id="{{ $member->id }}" data-nim="{{ $member->nim }}" data-dismiss="modal">Choose</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	const btnSelectBooks = document.querySelectorAll('.btn-select-book');
	btnSelectBooks.forEach(function(btnSelectBook) {
		btnSelectBook.addEventListener('click', function(e) {
			let inputBook = document.querySelector('input[name=book_id]');
			let labelBook = document.querySelector('input[name=book]');
			inputBook.value = btnSelectBook.dataset.id;
			labelBook.value = btnSelectBook.dataset.isbn;
		})
	});

	const btnSelectMembers = document.querySelectorAll('.btn-select-member');
	btnSelectMembers.forEach(function(btnSelectMember) {
		btnSelectMember.addEventListener('click', function(e) {
			let inputMember = document.querySelector('input[name=member_id]');
			let labelMember = document.querySelector('input[name=member]');
			inputMember.value = btnSelectMember.dataset.id;
			labelMember.value = btnSelectMember.dataset.nim;
		})
	});
</script>
@endsection