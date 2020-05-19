@extends('layout')

@section('content')

    <br><br><h1 class="title">Suppliers</h1>

    @include('message')

    <br>
    <div class="displayItems" style="color: #9d0006">
        <div class="name">Name</div>
        <div class="address">Address</div>
        <div class="city">City</div>
        <div class="phone">Phone</div>
    </div>
    <br>
    @foreach($supplier as $item)
        <div class="displayItems">
            <a class="name" href="/suppliers/{{ $item->id }}">{{ $item->name }}</a>
            <div class="address"> {{ $item->address }} </div>
            <div class="city"> {{ $item->city }} </div>
            <div class="phone"> {{ $item->phone }} </div>
        </div>
    @endforeach

    <div class="pagination">
        {{ $supplier->links() }}
    </div>
@endsection
