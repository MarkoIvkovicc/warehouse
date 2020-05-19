@extends('layout')

@section('content')
    <br><h1 class="title">Edit Supplier</h1>

    @include('message')

    <form action="/suppliers/{{ $supplier->id }}" method="POST">
        @method('PATCH')
        @csrf

        <div class="field">
            <label for="name" class="label">Name of Supplier</label>

            <div class="control">
                <input type="text" name="name" class="input" value="{{ $supplier->name }}">
            </div>
        </div>

        <div class="field">
            <label for="address" class="label">Address</label>

            <div class="control">
                <input type="text" name="address" class="input" value="{{ $supplier->address }}">
            </div>
        </div>

        <div class="field">
            <label for="city" class="label">City</label>

            <div class="control">
                <input type="text" name="city" class="input" value="{{ $supplier->city }}">
            </div>
        </div>

        <div class="field">
            <label for="phone" class="label">Phone</label>

            <div class="control">
                <input type="text" name="phone" class="input" value="{{ $supplier->phone }}">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update supplier</button>
            </div>
        </div>
    </form>

    <form action="/suppliers/{{ $supplier->id }}" method="POST">
        @method('DELETE')
        @csrf

        <br>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Delete Supplier</button>
            </div>
        </div>
    </form>

@endsection
