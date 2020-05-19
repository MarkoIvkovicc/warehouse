@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Statistics</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p style="font-size: 1.8em; font-weight: bold; text-align: center">Welcome!</p>
                        <p style="text-align: center; text-decoration: underline; font-weight: bold">This is our statistics</p>

                        <div style="margin-top: 20px;">
                            {!! $monthChart->container()  !!}
                        </div>

                        <div style="margin-top: 20px;">
                            {!! $yearChart->container()  !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
