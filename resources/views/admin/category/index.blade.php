@extends('layouts.main_layout')
@section('title', 'All categories')
@section('content')
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Category Table</h3>
            <a href="{{route('category.create')}}" type="button" class="btn btn-outline-success mr-1 mb-3 block-options">
                <i class="fa fa-fw fa-plus mr-1"></i> Add category
            </a>
        </div>
        <div class="block-content">
            <table class="table table-vcenter">
                <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Title</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <th class="text-center" scope="row">{{$category->id}}</th>
                    <td class="font-w600 font-size-sm">
                        <a href="be_pages_generic_profile.html">{{$category->title}}</a>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{route('category.edit', $category)}}" type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Client">
                                <i class="fa fa-fw fa-pencil-alt"></i>
                            </a>
                            <form action="{{route('category.destroy', $category)}}" method="POST">
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
