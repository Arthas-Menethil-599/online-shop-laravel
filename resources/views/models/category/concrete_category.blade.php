<?php
$product = $products[0] ?? null;
$name = 'Category';
if($product)
    $name = $product->category()->first()->title;
?>
@extends('layouts.main_layout')
@section('title', $name)
@section('content')
    <!-- Page Content -->
    <div class="content">
            <div class="col-xl-12 order-xl-0">

                <!-- Products -->
                <div class="row row-deck">
                    @foreach($products as $product)
                    <div class="col-md-6 col-xl-4">
                        <div class="block">
                            <div class="options-container">
                                <img class="img-fluid options-item" src="{{Storage::url($product->img)}}" alt="">
                                <div class="options-overlay bg-black-75">
                                    <div class="options-overlay-content">
                                        <a class="btn btn-sm btn-light" href="{{route('product.show', $product)}}">
                                            View
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="mb-2">
                                    <div class="h4 font-w600 text-success float-right ml-1">{{'$' . "{$product->product_price}"}}</div>
                                    <a class="h4" >{{$product->product_name}}</a>
                                </div>
                                <p class="font-size-sm text-muted">{{Str::limit($product->product_description,20)}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                <!-- END Products -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
