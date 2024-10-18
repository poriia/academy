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
@foreach ($tickets as $ticket)
<ul>
    <li>id : {{$ticket->id}}</li>
    <li>user : {{$ticket->user->first_name}}</li>
    <li>first_name : {{$ticket->title}}</li>
    <li>last_name : {{$ticket->body}}</li>
    <li>status : {{$ticket->status}}</li>
</ul>
<form class="mt-6" action="/admin/ticket/delete/{{$ticket->id}}" method="POST">
    @csrf
    <button class="text-sm text-red-500">Delete</button>
</form>

<form class="mt-6" action="/admin/ticket/{{$ticket->id}}/edit" method="GET">
    <button class="text-sm text-blue-500">Edit</button>
</form>
<hr>
@endforeach
@endsection