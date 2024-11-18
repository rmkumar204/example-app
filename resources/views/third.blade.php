@extends('app')

@section('page-css')
    @vite('resources/css/third.css')
@endsection

@section('content')
    <h1>Welcome to the Third Page</h1>
    <p>This is the content of the third page.</p>
@endsection

@section('page-js')
    @vite('resources/js/third.js')
@endsection
