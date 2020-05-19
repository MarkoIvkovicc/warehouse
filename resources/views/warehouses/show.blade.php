@extends('layout')

@section('content')
    <br><h1 class="title">{{ $warehouse->name }}</h1>

    <div class="showContent">
        <div class="content">{{ $warehouse->address }}</div>
        <div class="content">{{ $warehouse->city }}</div>
        <div class="content">{{ $warehouse->phone }}</div>
    </div>

    <div style="padding: 25px;">
        <button type="button" class="button is-link" onclick="window.location='/warehouses/{{$warehouse->id}}/edit'">Edit</button>
    </div>
@endsection
