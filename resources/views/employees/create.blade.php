@extends('layout')

@section('content')

    @include('message')

    <h1 class="title">Create Employee</h1>

    <form method="POST" action="/employees">
        @csrf

        <div class="field">
            <label for="name" class="label">Employee Name</label>

            <div class="control">
                <input type="text" name="name" class="input {{ $errors->has('title') ? 'is-danger' : '' }}"
                       value="{{ old('name') }}">
            </div>
        </div>

        <div class="field">
            <label for="age" class="label">Age</label>

            <div class="control">
                <input type="number" name="age" class="input {{ $errors->has('title') ? 'is-danger' : '' }}"
                       value="{{ old('age') }}">
            </div>
        </div>

        <div class="field">
            <label for="job_description" class="label">Job Description</label>

            <div class="control">
                <input type="text" name="job_description" class="input {{ $errors->has('title') ? 'is-danger' : '' }}"
                       value="{{ old('job_description') }}">
            </div>
        </div>

        <div class="field">
            <label for="warehouse_id" class="label">Choose Warehouse</label>

            <div class="select">
                <select name="warehouse_id">
                    @foreach($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create A New Employee</button>
            </div>
        </div>
    </form>
@endsection
