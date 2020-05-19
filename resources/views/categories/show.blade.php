@extends('layout')

@section('content')
    <br><br><h1 class="title">{{ $category->name }}</h1>

    <div class="showContent">
        <label for="description" class="label">Description</label>

        <div class="content">{{ $category->description }}</div>
    </div>

    <div style="padding: 25px;">
        <button type="button" class="button is-link" onclick="window.location='/categories/{{$category->id}}/edit'">Edit</button>
    </div>
@endsection
