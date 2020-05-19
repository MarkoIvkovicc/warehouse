@extends('layout')

@section('content')
    <br><h1 class="title">{{ $product->name }}</h1>

    <div class="showContent">
        <label for="name" class="label">Product Name</label>
        <div class="content">{{ $product->description }}</div>

        <label for="stock" class="label">Stock</label>
        <div class="content">{{ $product->stock }}</div>

        <label for="price" class="label">Price</label>
        <div class="content">{{ $product->price }}</div>

        <label for="category" class="label">Category</label>
        <div class="content">{{ $category }}</div>
    </div>

    <div style="padding: 25px;">
        <button type="button" class="button is-link" onclick="window.location='/products/{{$product->id}}/edit'">Edit</button>
    </div>
@endsection
