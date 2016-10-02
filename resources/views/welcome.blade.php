@extends('layouts.base')

@section('content')
    <hello></hello>

    @include('injectors.base-url')
    @include('injectors.route-has-login')
@endsection
