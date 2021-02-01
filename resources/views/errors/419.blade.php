@extends('layouts.error')
@section('title', 'Page Expired')
@section('imageURL', asset('img/419.svg'))
@section('error-title', 'Page Has Expired')
@section('content')
    <span>Sorry, your page has expired due ton inactivity on the site.</span>
    <p>Please refresh and try again.</p>
@endsection()