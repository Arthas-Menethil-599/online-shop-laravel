@extends('layouts.main_layout')
@section('title', 'Product')
@section('content')
<!-- Page Content -->
<div class="content">
        <div class="col-xl-8 order-xl-0">
            <!-- Product -->
            <div class="block">
                <div class="block-content">
                    <!-- Vitals -->
                    <div class="row items-push">
                        <div class="col-md-6">
                            <!-- Images -->
                            <!-- Magnific Popup (.js-gallery class is initialized in Helpers.magnific()) -->
                            <!-- For more info and examples you can check out http://dimsemenov.com/plugins/magnific-popup/ -->
                            <div class="row gutters-tiny js-gallery img-fluid-100">
                                <div class="col-12 mb-3">
                                    <a class="img-link img-link-zoom-in img-lightbox" href="{{Storage::url($product->img)}}">
                                        <img class="img-fluid" src="{{Storage::url($product->img)}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END Images -->
                        </div>
                        <div class="col-md-6">
                            <!-- Info -->
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="font-size-h2 font-w700">
                                    {{$product->product_name}}
                                </div>
                                <div class="font-size-h2 font-w700">
                                    $58
                                </div>
                            </div>
                            @auth
                            <form class="d-flex justify-content-between my-3 border-top border-bottom" action="{{route('cart.add', $product)}}" method="post">
                                @csrf
                                <input name="product_id" id="product_id" type="hidden" value="{{$product->id}}"/>
                                <div class="font-size-h2 font-w700">
                                    Seller: {{$product->user()->first()->name}}
                                </div>
                                <div class="py-3">
                                    <button type="submit" class="btn btn-sm btn-light">
                                        <i class="fa fa-plus text-success mr-1"></i> Add to Cart
                                    </button>
                                </div>
                            </form>
                            @endauth
                            <p style="overflow: hidden; margin-top: 20px">{{$product->product_description}}</p>
                            <!-- END Info -->

                        </div>
                    </div>
                    <!-- END Vitals -->


                </div>
            </div>
            <!-- END Product -->
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection
