@extends('template.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h2>Dashboard</h2>
</div>
<div class="row">
  <div class="col-xl-12 col-md-12 mb-3">
    <div class="card border-left-secondary shadow">
      <div class="card-body">
        <b>Welcome,</b> to the Library App.
      </div>  
    </div>     
  </div>
  <div class="col-xl-3 col-md-6 mb-3">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="card-body-icon mr-3">
            <i class="fas fa-book fa-3x text-gray-300"></i>
          </div>
          <h5 class="card-title text-xs font-weight-bold text-primary text-uppercase mb-1">Books</h5>
          <div class="font-weight-bold text-gray-800 text-primary">
            <p>{{ number_format($totalBooks) }}</p>
          </div>
        </div>  
      </div>     
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="card-body-icon mr-3">
            <i class="fa fa-user fa-3x text-gray-300"></i>
          </div>
          <h5 class="card-title text-xs font-weight-bold text-success text-uppercase mb-1">Members</h5>
          <div class="font-weight-bold text-gray-800 text-success">
            <p>{{ number_format($totalMembers) }}</p>
          </div>
        </div>  
      </div>     
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="card-body-icon mr-3">
            <i class="fa fa-users fa-3x text-gray-300"></i>
          </div>
          <h5 class="card-title text-xs font-weight-bold text-danger text-uppercase mb-1">Users</h5>
          <div class="font-weight-bold text-gray-800 text-danger">
            <p>{{ number_format($totalUsers) }}</p>
          </div>
        </div>  
      </div>     
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="card-body-icon mr-3">
            <i class="fas fa-edit fa-3x text-gray-300"></i>
          </div>
          <h5 class="card-title text-xs font-weight-bold text-warning text-uppercase mb-1">Borrowed Book</h5>
          <div class="font-weight-bold text-gray-800 text-warning">
            <p>{{ number_format($borrowedBook) }}</p>
          </div>
        </div>  
      </div>     
    </div>
</div>
@endsection