@extends('template.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h2>Report</h2>
</div>
<div class="row">
	<div class="col-md-12">
		@if($errors->any())
		<div class="alert alert-danger no-print">
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
		<div class="card shadow no-print mb-2">
			<div class="card-body">
				<form action="{{ url('report') }}" method="post" class="form-horizontal">
				  @csrf
				  <div class="row no-gutters">
				    <div class="col-md-5">
				      <div class="form-group">
				        <div class="row">
				          <label class="col-sm-3 control-label"><b>Start Date</b></label>
				          <div class="col-sm-8">
				            <input type="date" class="form-control" name="start" max="{{ date('Y-m-d') }}">  
				          </div>
				        </div>  
				      </div>  
				    </div>
				    <div class="col-md-5">
				      <div class="form-group">
				        <div class="row">
				          <label class="col-sm-3 control-label"><b>End Date</b></label>
				          <div class="col-sm-8">
				            <input type="date" max="{{ date('Y-m-d') }}" class="form-control" name="end">         
				          </div>
				        </div> 
				      </div> 
				    </div>
				    <div class="col-md-2">
				      <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
				    </div>
				  </div>
				</form>			
			</div>
		</div>
	</div>
  	@if(isset($transactions) && $transactions->count())
  	<div class="col-md-12">
	    <div class="card mb-5">
	    	<a href="#collapseCard" class="d-block card-header py-3 no-print" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCard">
                <h6 class="m-0 font-weight-bold text-primary">Data Transactions</h6>
            </a>
            <div class="collapse show" id="collapseCard">
		      	<div class="card-body">
		    		<p class="print text-muted mb-3">{{ date('d-m-Y', strtotime($startDate)) }} - {{ date('d-m-Y', strtotime($endDate)) }}</p>
		      		<div class="d-flex justify-content-end mb-3">
			    		<button type="button" name="pdf" class="btn btn-danger btn-sm no-print"><i class="fa fa-file-pdf"></i> Print</button>
		    		</div>
			        <table class="table table-bordered table-hover table-striped">
			        	<thead>
			        		<tr>
			        			<th width="1%">No</th>
			        			<th>Transaction Code</th>
								<th>Date</th>
								<th>Return Date</th>
								<th>Book</th>
								<th>Member</th>
								<th>User</th>
								<th class="text-center">Status</th>
			        		</tr>
			        	</thead>
			        	<tbody>
			        		@foreach($transactions as $transaction)
			        		<tr>
			        			<td>{{ $loop->iteration }}</td>
								<td>{{ $transaction->transaction_code }}</td>
								<td>{{ date('d-m-Y', strtotime($transaction->transaction_date)) }}</td>
								<td>{{ date('d-m-Y', strtotime($transaction->return_date)) }}</td>
								<td>{{ $transaction->book->title }}</td>
								<td>{{ $transaction->member->name }}</td>
								<td>{{ $transaction->user->name }}</td>
								<td>{{ $transaction->status }}</td>
			        		</tr>
			        		@endforeach
			        	</tbody>
			        </table>
		      	</div>
		    </div>
	    </div>
  	</div>
  	@elseif(isset($transactions) && $transactions->count() == 0)
  	<div class="col-md-12">
  		<center><p>No data available</p></center>
  	</div>	
  	@endif
</div>

<script type="text/javascript">
	const btnPdf = document.querySelector('button[name=pdf]')
	btnPdf.addEventListener('click', function(){
		window.print()
	})
</script>
@endsection