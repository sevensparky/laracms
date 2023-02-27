@extends('admin.section.master')
@section('app')

{{-- @dd(auth()->user()->role) --}}
@if (auth()->user()->role == 'admin')
@include('admin.layouts.dashboard.admin-templete')
@else
@include('admin.layouts.dashboard.user-templete')
@endif

@endsection
