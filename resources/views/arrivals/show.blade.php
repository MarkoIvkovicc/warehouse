@extends('layout')

@section('content')
    <br><h1 class="title">Arrival Data</h1>

    <div class="showContent">
        <div class="inlineInfo">
            <label for="arrivalDate" class="label">Arrival Date
                <span>{{ $arrival->arrival_date }}</span>
            </label>

            <label for="arrivalStock" class="label">Arrival Stock
                <span>{{ $arrival->arrival_stock }}</span>
            </label>

            <label for="expireDate" class="label">Expire Date
                <span style="color: #d70000">{{ $arrival->expire_date }}</span>
            </label>
        </div>

        <label for="productName" class="label">Products Name</label>
        <div class="content arrival">{{ $arrival->product->name }}</div>

        <label for="supplierName" class="label">Supplier Name</label>
        <div class="content arrival">{{ $arrival->supplier->name }}</div>

        <label for="employeeName" class="label">Employee Name</label>
        <div class="content arrival">{{ $arrival->employee->name }}</div>

        <label for="warehouseName" class="label">Warehouse Name</label>
        <div class="content arrival">{{ $arrival->warehouse->name }}</div>
    </div>

    <div style="padding: 25px;">
        <button type="button" class="button is-link" onclick="window.location='/arrivals/{{$arrival->id}}/edit'">Edit</button>
    </div>
@endsection
