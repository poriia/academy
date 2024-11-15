@extends('layouts.admin.admin_layout')
@section('body')
@if (session('success_message'))
<div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
    <p class="font-bold">Success message</p>
    <p class="text-sm"> {{ session('success_message') }}</p>
</div>
@endif
@if (session('error_message'))
<div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
    <p class="font-bold">Error message</p>
    <p class="text-sm"> {{ session('error_message') }}</p>
</div>
@endif
@include('admin.categories.partial',['categories'=>$categories])
@endsection