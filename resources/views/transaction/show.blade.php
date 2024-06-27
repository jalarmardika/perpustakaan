@extends('template.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h2>Detail Transaction</h2>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card mb-4">
			<div class="card-body">
				<div class="row">
				  <div class="col-md-4">
				  @if($transaction->book->image)	
				    <img src="{{ url('storage/' . $transaction->book->image) }}" class="img-fluid mb-3">
				  @else
				  	<center><h4 class="mb-3">No Image</h4></center>  
				  @endif
				  </div>
				  <div class="col-md-8">
				    <ul class="list-group">
				      <li class="list-group-item"><b>Transaction Code : </b>{{ $transaction->transaction_code }}</li>
				      <li class="list-group-item"><b>Transaction Date : </b>{{ date('d-m-Y', strtotime($transaction->transaction_date)) }}</li>
				      <li class="list-group-item"><b>Return Date : </b>{{ date('d-m-Y', strtotime($transaction->return_date)) }}</li>
				      <li class="list-group-item"><b>Title : </b>{{ $transaction->book->title }}</li>
				      <li class="list-group-item"><b>ISBN : </b>{{ $transaction->book->isbn }}</li>
				      <li class="list-group-item"><b>NIM : </b>{{ $transaction->member->nim }}</li>
				      <li class="list-group-item"><b>Name : </b>{{ $transaction->member->name }}</li>
				      <li class="list-group-item">
				      	<b>Status : </b>
				      	@if($transaction->status == 'borrowed')
							<span class="badge bg-danger text-white">Borrowed</span>
						@else
							<span class="badge bg-success text-white">Returned</span>
						@endif	
				      </li>
				      <li class="list-group-item"><b>Notes : </b>{{ $transaction->notes }}</li>
				      <li class="list-group-item"><b>User : </b>{{ $transaction->user->name }}</li>
				    </ul>
				  </div>
				</div>
				<div class="d-flex justify-content-end">
					<a href="{{ url('transaction') }}" class="btn btn-secondary text-gray btn-sm mt-3">Back</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection