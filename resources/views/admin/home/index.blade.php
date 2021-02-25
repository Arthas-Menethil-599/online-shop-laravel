@extends('layouts.main_layout')
@section('title', 'Admin panel')
@section('content')

    <!-- Categories-->
    <div class="content content-boxed overflow-hidden">
        <div class="row">
            <div class="col-sm-6 col-md-3 invisible" data-toggle="appear" data-timeout="200" data-class="animated fadeInDown">
                <a class="block block-bordered block-rounded block-link-shadow" href="{{route('product.index')}}">
                    <div class="block-content block-content-full border-bottom text-center">
                        <div class="py-3">
                            <i class="si si-settings fa-2x text-city"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <span class="font-w600 text-uppercase font-size-sm">Products</span>
                        <span class="badge badge-secondary">{{$products_count}}</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3 invisible" data-toggle="appear" data-timeout="400" data-class="animated fadeInDown">
                <a class="block block-bordered block-rounded block-link-shadow" href="{{route('category.index')}}">
                    <div class="block-content block-content-full border-bottom text-center">
                        <div class="py-3">
                            <i class="si si-target fa-2x text-flat"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <span class="font-w600 text-uppercase font-size-sm">Categories</span>
                        <span class="badge badge-secondary">{{$categories_count}}</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3 invisible" data-toggle="appear" data-timeout="600" data-class="animated fadeInDown">
                <a class="block block-bordered block-rounded block-link-shadow" href="{{route('admin.payments')}}">
                    <div class="block-content block-content-full border-bottom text-center">
                        <div class="py-3">
                            <i class="si si-wallet fa-2x text-smooth"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <span class="font-w600 text-uppercase font-size-sm">Payments</span>
                        <span class="badge badge-secondary">{{$payments_count}}</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- END Categories -->
@endsection
