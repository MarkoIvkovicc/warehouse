@extends('layout')

@section('content')
    <h1 class="title">Create Product</h1>

    @include('message')

    <form method="POST" action="/products">
        @csrf

        <div class="field">
            <label for="name" class="label">Product Name</label>

            <div class="control">
                <input type="text" name="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" value="{{ old('name') }}">
            </div>
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>

            <div class="control">
                <textarea name="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}"
                >{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="field">
            <label for="price" class="label">Price</label>

            <div class="control">
                <input type="number" name="price" class="input {{ $errors->has('price') ? 'is-danger' : '' }}" value="{{ old('price') }}">
            </div>
        </div>

        <div class="field">
            <label for="price" class="label">Category</label>

            <div class="select">
                <select name="category_id">
                    @foreach($category as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create A New Product</button>
            </div>
        </div>
    </form>
@endsection
