@extends('app')

@section('page-css')
    @vite('resources/css/initial.css')
@endsection

@section('content')
@include('job')
@endsection


@section('page-js')
@vite('resources/js/initial.js')
@endsection