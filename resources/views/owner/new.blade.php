@extends('layout')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">New Owner</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Owner</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <!-- form start -->
                <form role="form" action="/owner/new" method="POST">
                    @csrf
                    <div class="card-body">
                        @if (session()->has('owner_status'))
                            <div class="form-group">
                                <button class="btn btn-block btn-primary">{{ session()->get('owner_status') }}</button>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword89">Email Address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputPassword89" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword89">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword89" placeholder="Password">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection