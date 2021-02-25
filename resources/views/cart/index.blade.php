@extends('layouts.main_layout')
@section('title', 'Shopping cart')
@section('content')
    <!-- Shopping Cart -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">1. Products</h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-borderless table-hover table-vcenter">
                <tbody>
                @foreach($cartCollection as $cart_item)
                <tr>
                    <td class="text-center">
                        <form action="{{route('cart.remove')}}" method="POST">
                            @csrf
                            <input name="id" id="id" type="hidden" value="{{$cart_item['id']}}"/>
                            <button class="text-danger"><i class="fa fa-times"></i></button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="{{route('cart.update')}}" method="POST">
                            @csrf
                            <input name="id" id="id" type="hidden" value="{{$cart_item['id']}}"/>
                            <input type="number" min="1" name="qty" id="qty" value="{{$cart_item['quantity']}}" />
                            <button class="text-success">Set quantity</button>
                        </form>
                    </td>
                    <td style="width: 60px;">
                        <img class="img-fluid" src="{{Storage::url($cart_item->attributes['img'])}}" alt="">
                    </td>
                    <td>
                        <a class="h5" href="be_pages_ecom_store_product.html">{{$cart_item['name']}}</a>
                    </td>
                    <td class="text-right">
                        <div class="font-w600 text-success">${{$cart_item['price'] * $cart_item['quantity']}}</div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @if(\Cart::session(auth()->user()->id)->getTotal() > 0)
            <form action="{{route('confirm_purchase')}}" method="POST">
                @csrf
                <input name="id" id="id" type="hidden" value="{{auth()->user()->id}}"/>
                <button class="btn btn-primary">
                    Confirm purchase: ${{Cart::getTotal()}}
                </button>
            </form>
            @else
                <h1>Shopping cart is empty</h1>
            @endif
        </div>
    </div>
    <!-- END Shopping Cart -->

@endsection
