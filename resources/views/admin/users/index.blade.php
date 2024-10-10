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
@foreach ($users as $user)
<ul>
    <li>id : {{$user->id}}</li>
    <li>first_name : {{$user->first_name}}</li>
    <li>last_name : {{$user->last_name}}</li>
    <li>phone_number : {{$user->phone_number}}</li>
    <li>email : {{$user->email}}</li>
    <li>created at : {{$user->asghar}}</li>
</ul>
<form class="mt-6" action="/admin/user/delete/{{$user->id}}" method="POST">
    @csrf
    <button class="text-sm text-red-500">Delete</button>
</form>

<form class="mt-6" action="/admin/user/{{$user->id}}/edit" method="GET">
    <button class="text-sm text-blue-500">Edit</button>
</form>
<hr>
@endforeach
@endsection