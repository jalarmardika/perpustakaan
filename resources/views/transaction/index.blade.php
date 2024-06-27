@extends('template.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h2>Transactions</h2>
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
			    <h6 class="m-0 font-weight-bold text-primary">Data Transactions</h6>
			</a>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="collapseCardExample">
				<div class="card-body">
					<a href="{{ url('transaction/create') }}" class="btn btn-outline-primary btn-sm mb-3">Add Transaction</a>
					<table id="dataTable" class="table table-bordered table-hover table-striped table-responsive">
						<thead>
							<tr>
								<th width="1%">No</th>
								<th>Transaction Code</th>
								<th>Date</th>
								<th>Member</th>
								<th class="text-center">Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($transactions as $transaction)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $transaction->transaction_code }}</td>
								<td>{{ date('d-m-Y', strtotime($transaction->transaction_date)) }}</td>
								<td>{{ $transaction->member->name }}</td>
								<td class="text-center">
									@if($transaction->status == 'borrowed')
										<span class="badge bg-danger text-white">Borrowed</span>
									@else
										<span class="badge bg-success text-white">Returned</span>
									@endif		
								</td>
								<td>
									<a href="{{ url('transaction/'. $transaction->id) }}" class="btn btn-outline-success btn-sm">Detail</a>
									
									@if($transaction->status == 'borrowed')
										<a href="{{ url('transaction/'. $transaction->id .'/edit') }}" class="btn btn-outline-warning btn-sm">Edit</a>
									@endif

									<form action="{{ url('transaction/'. $transaction->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure ?')">
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