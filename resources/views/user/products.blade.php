@extends('layout')
@section('content')

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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <img class="bdtgyimg" src="{{ asset($product->IMAGE) }}" alt="">
                                </td>
                                <td>{{ $product->TITLE }}</td>
                                <td>{{ $product->PRICE }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>PRODUCT IMG</th>
                            <th>PRODUCT TITLE</th>
                            <th>PRODUCT PRICE</th>
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

