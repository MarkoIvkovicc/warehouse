@extends('layout')

@section('content')
    <br><h1 class="title">Edit Arrival Data</h1>

    @include('message')

    <form action="/arrivals/{{ $arrival->id }}" method="POST">
        @method('PATCH')
        @csrf

        <div class="field">
            <label for="arrival_date" class="label">Arrival Date</label>

            <div class="control">
                <input type="date" name="arrival_date" class="input" value="{{ $arrival->arrival_date }}">
            </div>
        </div>

        <div class="field">
            <label for="arrival_stock" class="label">Arrival Stock</label>

            <div class="control">
                <input type="number" name="arrival_stock" class="input" value="{{ $arrival->arrival_stock }}">
            </div>
        </div>

        <div class="field">
            <label for="expire_date" class="label">Expire Date</label>

            <div class="control">
                <input type="date" name="expire_date" class="input" value="{{ $arrival->expire_date }}">
            </div>
        </div>

        <div class="field">
            <label for="product_id" class="label">Product</label>

            <div class="select">
                <select name="product_id">
                    <option value="{{ $arrival->product->id }}">{{ $arrival->product->name }}</option>
                    @foreach($product as $prod)
                        <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <label for="supplier_id" class="label">Supplier</label>

            <div class="select">
                <select name="supplier_id">
                    <option value="{{ $arrival->supplier->id }}">{{ $arrival->supplier->name }}</option>
                    @foreach($supplier as $sup)
                        <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <label for="employee_id" class="label">Employee</label>

            <div class="select">
                <select name="employee_id">
                    <option value="{{ $arrival->employee->id }}">{{ $arrival->employee->name }}</option>
                    @foreach($employee as $emp)
                        <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <label for="warehouse_id" class="label">Warehouse</label>

            <div class="select">
                <select name="warehouse_id">
                    <option value="{{ $arrival->warehouse->id }}">{{ $arrival->warehouse->name }}</option>
                    @foreach($warehouse as $war)
                        <option value="{{ $war->id }}">{{ $war->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <br>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Arrival Data</button>
            </div>
        </div>
    </form>

    <form action="/arrivals/{{ $arrival->id }}" method="POST">
        @method('DELETE')
        @csrf

        <br>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Delete Arrival Data</button>
            </div>
        </div>
    </form>
@endsection
