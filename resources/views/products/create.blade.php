@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Product</h1>
    </div>
    <div id="app">
        <create-product :variants="{{ $variants }}">Loading</create-product>

        <div class="container">
            <form action="{{url('store-product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input class="form-control" placeholder="Title" type="text" name="title" required>* require field<br>
                <input class="form-control" placeholder="SKU" type="text" name="sku" required>* require field<br>
                <input class="form-control" placeholder="Description" type="text" name="description" required>* require field<br>
                <input class="form-control" placeholder="Price" type="number" name="price" required>* require field<br>
                <input class="form-control" placeholder="Stock Quantity" type="number" name="stock" required>* require field<br>
                <input class="form-control" type="file" name="picture" required>* require field<br><hr>
                Varient 1:<br>
                <input class="form-control" placeholder="Varient 1 Title" type="text" name="v1_title"><br>
                <input class="form-control" placeholder="Varient 1 Description" type="text" name="v1_description"><br>
                <input class="form-control" placeholder="Price" type="number" name="v1_price"><br>
                Varient 2<br>
                <input class="form-control" placeholder="Varient 2 Title" type="text" name="v2_title"><br>
                <input class="form-control" placeholder="Varient 2 Description" type="text" name="v2_description"><br>
                <input class="form-control" placeholder="Price" type="number" name="v2_price"><br>
                Varient 3<br>
                <input class="form-control" placeholder="Varient 3 Title" type="text" name="v3_title"><br>
                <input class="form-control" placeholder="Varient 3 Description" type="text" name="v3_description"><br>
                <input class="form-control" placeholder="Price" type="number" name="v3_price"><br>
                <button type="submit" class="btn btn-outline-dark">Add Product</button>
            </form>
        </div>
    </div>
@endsection
