@extends('layout')

@section('content')
    <br><h1 class="title">Create Arrival Data</h1>

    @include('message')

    <form method="POST" action="/arrivals">
        @csrf

        <div class="field">
            <label for="arrival_date" class="label">Arrival Date</label>

            <div class="control">
                <input type="date" name="arrival_date" class="input {{ $errors->has('arrival_date') ? 'is-danger' : '' }}" value="{{ !empty(old('arrival_date')) ? old('arrival_date') : $todayDate }}">
            </div>
        </div>

        <div class="field">
            <label for="arrival_stock" class="label">Arrival Stock</label>

            <div class="control">
                <input type="number" name="arrival_stock" class="input {{ $errors->has('arrival_stock') ? 'is-danger' : '' }}" value="{{ old('arrival_stock') }}">
            </div>
        </div>

        <div class="field">
            <label for="expire_date" class="label">Expire Date</label>

            <div class="control">
                <input type="date" name="expire_date" class="input {{ $errors->has('expire_date') ? 'is-danger' : '' }}" value="{{ old('expire_date') }}">
            </div>
        </div>

        <div class="field">
            <label for="product_id" class="label">Product Name</label>

            <div class="select">
                <select name="product_id">
                    @foreach($product as $pro)
                        <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <label for="supplier_id" class="label">Supplier Name</label>

            <div class="select">
                <select name="supplier_id">
                    @foreach($supplier as $sup)
                        <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <label for="employee_id" class="label">Employee Name</label>

            <div class="select">
                <select name="employee_id">
                    @foreach($employee as $emp)
                        <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <label for="warehouse_id" class="label">Warehouse Name</label>

            <div class="select">
                <select name="warehouse_id">
                    @foreach($warehouse as $war)
                        <option value="{{ $war->id }}">{{ $war->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create A New Arrival Data</button>
            </div>
        </div>
    </form>
@endsection
