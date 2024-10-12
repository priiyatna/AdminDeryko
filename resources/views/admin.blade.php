@extends('layouts.app')

@section('dashboard_title', 'Admin')

@section('content')
   

<div class="row m-2">

<!-- Card jumlah Produk -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card bg-primary text-white shadow">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold text-white-800">50</div>
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        Jumlah Produk</div>
                   
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Card PO -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card bg-success text-white shadow">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold text-white-800">10</div>
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        PO (Purchase Order)</div>
                    
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


 <!-- Card customer -->
 <div class="col-xl-3 col-md-6 mb-4">
    <div class="card bg-warning text-white shadow">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold text-white-800">7</div>
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        Customer</div>
                    
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Card Admin -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card bg-danger text-white shadow">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold text-white-800">1</div>
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        Admin</div>
                   
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- DataTales Example -->

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow p-5">
<table class="table table-bordered">
    <thead>
        <tr>
         <th>NO</th>
         <th>Nama</th>
         <th>Email</th>                     
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td> {{ $user->name }}</td>
            <td>{{ $user->email }}</td> 
        </tr>
    </Tbody>
</table>
</div>
        
<!-- Form untuk mengganti nama dan email -->

<div class="container p-5 ">
<h1>Ganti Email Dan Pengguna</h1>
<form action="{{ route('update.profile') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


</div>
</div>
@endsection
