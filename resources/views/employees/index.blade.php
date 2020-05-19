@extends('layout')

@section('content')

    <br><br><h1 class="title">Employees</h1>

    @include('message')
    <br>

    <div class="displayItems" style="color: #9d0006">
        <div class="name">Name</div>
        <div class="age">Age</div>
        <div class="description">Job Description</div>
        <div class="warehouse">Warehouse</div>
    </div>
    <br>
    @foreach($employee as $item)
        <div class="displayItems">
            <a class="name" href="/employees/{{ $item->id }}">{{ $item->name }}</a>
            <div class="age"> {{ $item->age }} </div>
            <div class="description"> {{ $item->job_description }} </div>
            <div class="warehouse"> {{ $item->warehouse->name }} </div>
        </div>
    @endforeach

    <div class="pagination">
        {{ $employee->links() }}
    </div>
@endsection
