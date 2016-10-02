@extends('layouts.base')

@section('content')
    <div id="hello"></div>

    @include('injectors.base-url')
    @include('injectors.route-has-login')
@endsection
