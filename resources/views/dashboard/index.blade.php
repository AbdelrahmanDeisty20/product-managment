@extends('layouts.app')
@section('page_title')
    <h1>Products</h1>
@endsection


@section('content')
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">all products</h3>

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
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (count($products))
                    <a href="{{route('products.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>
                        create product</a>

                    <div class="table-responsive">
                        <table class="table table-bordered" style="margin-top: 10px">
                            <thead>
                                <th class="text-center">#</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Product description</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">quntity</th>
                                <th class="text-center">image</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $product->name }}</td>
                                        <td class="text-center">{{ $product->description }}</td>
                                        <td class="text-center">{{ $product->price }}</td>
                                        <td class="text-center">{{ $product->quantity }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset( $product->image) }}" alt=""
                                                width="50" height="50">
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{route('products.destroy',$product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('are you sure wou want delete this?')"><i
                                                        class="fa fa-trash-o">
                                                    </i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <a href="{{route('products.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>
                            create product</a>
                    <br>
                    <br>
                    <div class="alert alert-danger" role="alert">
                        no data
                    </div>
                @endif
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
