@extends('layout')

@section('content')
    <h1 class="title">Create Supplier</h1>

    @include('message')

    <form method="POST" action="/suppliers">
        @csrf

        <div class="field">
            <label for="name" class="label">Supplier Name</label>

            <div class="control">
                <input type="text" name="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" value="{{ old('name') }}">
            </div>
        </div>

        <div class="field">
            <label for="address" class="label">Address</label>

            <div class="control">
                <input type="text" name="address" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" value="{{ old('address') }}">
            </div>
        </div>

        <div class="field">
            <label for="city" class="label">City</label>

            <div class="control">
                <input type="text" name="city" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" value="{{ old('city') }}">
            </div>
        </div>

        <div class="field">
            <label for="phone" class="label">Phone</label>

            <div class="control">
                <input type="number" name="phone" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" value="{{ old('phone') }}">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create A New Supplier</button>
            </div>
        </div>
    </form>
@endsection
