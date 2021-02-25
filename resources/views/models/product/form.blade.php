<?php
$product = $product ?? null;
?>
@extends('layouts.main_layout')

@if($product)
    @section('title', 'Edit product')
@else
    @section('title','Add product')
@endif

@section('content')
    <div class="block">
        <div class="block-content block-content-full">
            <form enctype="multipart/form-data" action="{{$product ? route('product.update', $product) : route('product.store')}}" method="POST">
                @csrf

                @if($product)
                    @method('put')
                @endif

                <div class="row">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div style="margin: 10px">
                            <label for="example-text-input-alt">Product title</label>
                            <input type="text" value="{{ old('product_name', $product->product_name ?? null) }}" class="form-control form-control-alt" id="product_name" name="product_name" placeholder="Input product title here...">
                            @error('product_name')
                            <div>{{$message}}</div>
                            @enderror
                        </div>
                        <div style="margin: 10px">
                            <label>Category</label>
                            <select class="custom-select" id="category_id" name="category_id">
                                <option value="0">Please select category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($product) @if($category->id == $product->category()->first()->id) selected @endif @endif>{{$category->title}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div>{{$message}}</div>
                            @enderror
                        </div>
                        <div style="margin: 10px">
                            <label for="example-textarea-input">Description</label>
                            <textarea class="form-control" id="example-textarea-input" name="product_description" id="product_description" rows="4" placeholder="description...">@if($product){{$product->product_description}} @endif</textarea>
                            @error('product_description')
                            <div>{{$message}}</div>
                            @enderror
                        </div>
                        <div class="input-group" style="margin: 10px">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    $
                                </span>
                            </div>
                            <input value="{{ old('product_price', $product->product_price ?? null) }}" type="text" class="form-control text-center" id="product_price" name="product_price" placeholder="00">
                            <div class="input-group-append">
                                <span class="input-group-text">,00</span>
                            </div>
                            @error('product_price')
                            <div>{{$message}}</div>
                            @enderror
                        </div>
                        <div style="margin: 10px">
                            <label for="image">Обложка</label>
                            <input type="file" name="image" id="image" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                    </div>
                    <button type="submit" class="btn btn-primary col-lg-3">
                        {{$product ? 'Edit' : 'Add'}}
                    </button>
                    <div class="col-lg-4">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
