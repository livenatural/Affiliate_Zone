@extends('layout')
@section('content')

@if (!session()->has('USER_LOGIN'))
    <!--Login Overlay Screen-->
<div class="login-overlay">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>User</b></a>
            </div>
            <div class="card-body">
                <form action="/login" method="post">
                    @csrf
                    @if (session()->has('login_blocked'))
                      <div class="input-group mb-3">
                        <Button class="btn btn-danger btn-block">Account Blocked</Button>
                      </div>
                    @endif
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                      <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                          I agree with <a href="#">Terms</a> & <a href="#">Conditions</a>
                        </label>
                    </div>
                    <div class="social-auth-links text-center mt-2 mb-3">
                      <Button type="submit" class="btn btn-block btn-primary">
                         Continue
                      </Button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Login Overlay Screen-->
@endif


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>PRODUCT IMG</th>
                          <th>PRODUCT TITLE</th>
                          <th>PRODUCT PRICE</th>
                          <th>PRODUCT LINK</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <img class="bdtgyimg" src="{{ asset($product->IMAGE) }}" alt="">
                                </td>
                                <td><a href="/product/{{ $product->id }}">{{ $product->TITLE }}</a></td>
                                <td>{{ $product->PRICE }}</td>
                                <td>
                                    <a href="{{ $product->LINK }}" class="btn btn-sm btn-warning">
                                        <i class="nav-icon ion ion-bag"></i>
                                        Buy Now
                                    </a>
                                </td>
                          </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>PRODUCT IMG</th>
                            <th>PRODUCT TITLE</th>
                            <th>PRODUCT PRICE</th>
                            <th>PRODUCT LINK</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

