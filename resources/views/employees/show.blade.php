@extends('layout')

@section('content')
    <br><h1 class="title">{{ $employee->name }}</h1>

    <div class="showContent">
        <div class="content">{{ $employee->age }}</div>
        <div class="content">{{ $employee->job_description }}</div>
        <div class="content">{{ $employee->warehouse->name }}</div>
    </div>

    <div style="padding: 25px;">
        <button type="button" class="button is-link" onclick="window.location='/employees/{{$employee->id}}/edit'">Edit</button>
    </div>
@endsection
