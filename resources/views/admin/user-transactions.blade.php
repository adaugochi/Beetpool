@extends('admin.layouts.main')
@section('title', 'Users')
@section('back', route('admin.user'))
@section('back-title', 'Transactions')
@section('content-title', 'KYC / ' . $user->full_name)
@section('content')
@endsection