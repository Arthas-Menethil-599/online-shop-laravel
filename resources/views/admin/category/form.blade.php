<?php
$category = $category ?? null;
?>
@extends('layouts.main_layout')

@if($category)
    @section('title', 'Edit category')
@else
    @section('title','Add category')
@endif

@section('content')
    <div class="block">
        <div class="block-content block-content-full">
            <form enctype="multipart/form-data" action="{{$category ? route('category.update', $category) : route('category.store')}}" method="POST">
                @csrf

                @if($category)
                    @method('put')
                @endif

                <div class="row">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="form-group">
                            <label for="example-text-input-alt">Category title</label>
                            <input type="text" value="{{ old('title', $category->title ?? null) }}" class="form-control form-control-alt" id="title" name="title" placeholder="Input category title here...">
                            @error('title')
                            <div>{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-5">
                </div>
                <button type="submit" class="btn btn-primary col-lg-3">
                    {{$category ? 'Edit' : 'Add'}}
                </button>
                    <div class="col-lg-4">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
