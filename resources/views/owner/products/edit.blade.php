@extends('layout')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Update Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Prodducts</li>
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
                <form role="form" action="/owner/products/new" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($product->id))
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="pre_img" value="{{ $product->IMAGE }}">
                    @endif
                    <div class="card-body">
                        @if (session()->has('product_status'))
                            <div class="form-group">
                                <button class="btn btn-block btn-primary">{{ session()->get('product_status') }}</button>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Title</label>
                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Product Title" value="{{ $product->TITLE }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Description</label>
                            <textarea class="form-control" name="description" id="exampleInputPassword1" rows="3" placeholder="Type ...">{{ $product->DESCRIPTION }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword89">Product Price</label>
                            <input type="number" class="form-control" name="price" id="exampleInputPassword89" placeholder="Product Price" value="{{ $product->PRICE }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword890">Product Link</label>
                            <input type="text" class="form-control" name="link" id="exampleInputPassword890" placeholder="Product Link" value="{{ $product->LINK }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Product Image*</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                    <label class="custom-file-label" for="exampleInputFile">{{ $product->IMAGE }}</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
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