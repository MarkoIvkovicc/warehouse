@extends('layout')

@section('content')

    <br><br><h1 class="title">Warehouses</h1>

    <br>
    <div class="displayItems" style="color: #9d0006">
        <div class="name">Name</div>
        <div class="address">Address</div>
        <div class="city">City</div>
        <div class="phone">Phone</div>
    </div>
    <br>
    <ol>
        @foreach($warehouse as $item)
            <li>
                <div class="displayItems">
                    <a class="name" href="/warehouses/{{ $item->id }}">{{ $item->name }}</a>
                    <div class="address"> {{ $item->address }} </div>
                    <div class="city"> {{ $item->city }} </div>
                    <div class="phone"> {{ $item->phone}} </div>
                </div>
            </li>
        @endforeach
    </ol>

    <div class="pagination">
        {{ $warehouse->links() }}
    </div>
@endsection
