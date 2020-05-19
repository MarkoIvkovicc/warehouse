@extends('layout')

@section('content')
    <h1 class="title">Create Warehouse</h1>

    @include('message')

    <form method="POST" action="/warehouses">
        @csrf

        <div class="field">
            <label for="name" class="label">Warehouse Name</label>

            <div class="control">
                <input type="text" name="name" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" value="{{ old('name') }}" required>
            </div>
        </div>

        <div class="field">
            <label for="address" class="label">Address</label>

            <div class="control">
                <input type="text" name="address" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" value="{{ old('address') }}" required>
            </div>
        </div>

        <div class="field">
            <label for="city" class="label">City</label>

            <div class="control">
                <input type="text" name="city" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" value="{{ old('city') }}" required>
            </div>
        </div>

        <div class="field">
            <label for="phone" class="label">Phone</label>

            <div class="control">
                <input type="number" name="phone" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" value="{{ old('phone') }}" required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create A New Warehouse</button>
            </div>
        </div>
    </form>
@endsection
