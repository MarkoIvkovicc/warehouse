@extends('layout')

@section('content')
    <br><h1 class="title">Edit Category</h1>

    @include('message')

    <form action="/categories/{{ $category->id }}" method="POST">
        @method('PATCH')
        @csrf

        <div class="field">
            <label for="name" class="label">Name of Category</label>

            <div class="control">
                <input type="text" name="name" class="input" value="{{ $category->name }}">
            </div>
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>

            <div class="control">
                <textarea name="description" class="textarea">{{ $category->description }}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update category</button>
            </div>
        </div>
    </form>

    <form action="/categories/{{ $category->id }}" method="POST">
        @method('DELETE')
        @csrf

        <br>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Delete Product</button>
            </div>
        </div>
    </form>

@endsection
