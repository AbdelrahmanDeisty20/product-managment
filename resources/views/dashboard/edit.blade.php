@extends('layouts.app')
@section('page_title')
    edit Products
@endsection


@section('content')
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">edit products</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form action="{{route('products.update',$products->id)}}" method="POST" id="product-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" class="form-control btn-margin @error('name') is-invalid @enderror" id="name"
                            name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        <label for="name">description</label>
                        <input type="text" class="form-control btn-margin @error('description') is-invalid @enderror" id="description"
                            name="description">
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        <label for="name">price</label>
                        <input type="text" class="form-control btn-margin @error('price') is-invalid @enderror" id="price"
                            name="price">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        <label for="name">quantity</label>
                        <input type="text" class="form-control btn-margin @error('quantity') is-invalid @enderror" id="quantity"
                            name="quantity">
                        @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">image</label>
                        <input type="file" class="form-control btn-margin @error('image') is-invalid @enderror" id="image"
                            name="image">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="submit-btn">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection


