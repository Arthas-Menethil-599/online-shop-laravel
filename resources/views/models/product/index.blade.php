@extends('layouts.main_layout')
@section('title', 'All products')
@section('content')
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Category Table</h3>
            <a href="{{route('product.create')}}" type="button" class="btn btn-outline-success mr-1 mb-3 block-options">
                <i class="fa fa-fw fa-plus mr-1"></i> Add product
            </a>
        </div>
        <div class="block-content">
            <table class="table table-vcenter">
                <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th class="text-center" scope="row">{{$product->id}}</th>
                        <td class="font-w600 font-size-sm">
                            <a href="{{route('product.show', $product)}}">{{$product->product_name}}</a>
                        </td>
                        <td class="font-w600 font-size-sm">
                            <a>{{$product->product_price}}</a>
                        </td>
                        <td class="font-w600 font-size-sm">
                            <a>{{Str::limit($product->product_description, 30)}}</a>
                        </td>
                        <td class="font-w600 font-size-sm">
                            <a>{{$product->category()->first()->title}}</a>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{route('product.edit', $product)}}" type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Client">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('product.destroy', $product)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Client">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
