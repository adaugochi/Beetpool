@extends('layouts.error')
@section('title', 'Page Expired')
@section('imageURL', asset('img/500.svg'))
@section('error-title', 'Server Error Occurred')
@section('content')
    <span>Ooops, something went wrong on our server</span>
    <p>Please refresh and try again.</p>
@endsection()