@extends('app')

@section('page-css')
    @vite('resources/css/second.css')
@endsection

@section('content')
   @include('joblist')
@endsection

@section('page-js')
    @vite('resources/js/second.js')
@endsection