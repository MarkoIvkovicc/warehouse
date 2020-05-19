@extends('layout')

@section('content')
    <br><h1 class="title">{{ $supplier->name }}</h1>

    <div class="showContent">
        <div class="content">{{ $supplier->address }}</div>
        <div class="content">{{ $supplier->city }}</div>
        <div class="content">{{ $supplier->phone }}</div>
    </div>

    <div style="padding: 25px;">
        <button type="button" class="button is-link" onclick="window.location='/suppliers/{{$supplier->id}}/edit'">Edit</button>
    </div>
@endsection
