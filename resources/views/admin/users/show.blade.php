@extends('layouts.admin.admin_layout')

@section('body')
<ul>
    <li>id : {{$user->id}}</li>
    <li>first_name : {{$user->first_name}}</li>
    <li>last_name : {{$user->last_name}}</li>
    <li>phone_number : {{$user->phone_number}}</li>
    <li>email : {{$user->email}}</li>
    <li>created at : {{$user->created_at}}</li>
</ul>
<hr>
@endsection