@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
    </div>
    <div id="app">
{{--        <create-product :variants="{{ $variant }}">Loading</create-product>--}}

        <div class="container">
            <form action="{{url('/edit-product/'.$productInfo->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input class="form-control" value="{{$productInfo->title}}" type="text" name="title" required>* require field<br>
                <input class="form-control" value="{{$productInfo->sku}}" type="text" name="sku" required>* require field<br>
                <input class="form-control" value="{{$productInfo->description}}" type="text" name="description" required>* require field<br>
                <input class="form-control" value="{{$productVariantPrice->price}}" type="number" name="price" required>* require field<br>
                <input class="form-control" value="{{$productVariantPrice->stock}}" type="number" name="stock" required>* require field<br>
                <button type="submit" class="btn btn-outline-dark">Update Product</button>
            </form>
        </div>
    </div>
@endsection
