@extends('layout')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
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
            <div class="col-md-5">
                <img class="pro-tyi" src="{{ asset($product->IMAGE) }}" alt="">
            </div>
            <div class="col-md-7">
                <h2>{{ $product->TITLE }}</h2>
                <p>{{ $product->DESCRIPTION }}</p>
                <h1 class="euro-sy">€ {{ $product->PRICE }}</h1>
                <a class="btn btn-warning" href="{{ $product->LINK }}">Buy Now</a>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection