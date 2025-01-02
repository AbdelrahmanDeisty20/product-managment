@inject('users','App\Models\User' )
@inject('products','App\Models\Product' )

@extends('layouts.app')

@section('page_title')
    Dashboard
@endsection

@section('small_title')
    statistics
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">users</span>
                        <span class="info-box-number">{{$users->count()}}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-line-chart"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">products</span>
                        <span class="info-box-number">{{$products->count()}}</span>
                    </div>
                </div>
            </div>

    </section>
    <!-- /.content -->
@endsection
