@extends('layout')

@section('content')
    <br><h1 class="title">Edit Warehouse</h1>

    @include('message')

    <form action="/warehouses/{{ $warehouse->id }}" method="POST">
        @method('PATCH')
        @csrf

        <div class="field">
            <label for="name" class="label">Name of Warehouse</label>

            <div class="control">
                <input type="text" name="name" class="input" value="{{ $warehouse->name }}">
            </div>
        </div>

        <div class="field">
            <label for="address" class="label">Address</label>

            <div class="control">
                <input type="text" name="address" class="input" value="{{ $warehouse->address }}">
            </div>
        </div>

        <div class="field">
            <label for="city" class="label">City</label>

            <div class="control">
                <input type="text" name="city" class="input" value="{{ $warehouse->city }}">
            </div>
        </div>

        <div class="field">
            <label for="phone" class="label">Phone</label>

            <div class="control">
                <input type="text" name="phone" class="input" value="{{ $warehouse->phone }}">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Warehouse</button>
            </div>
        </div>
    </form>

    <form action="/warehouses/{{ $warehouse->id }}" method="POST">
        @method('DELETE')
        @csrf

        <br>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Delete Warehouse</button>
            </div>
        </div>
    </form>

@endsection
