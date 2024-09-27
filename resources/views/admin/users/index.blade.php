@extends('layouts.admin.admin_layout')

@section('body')
    @foreach ($users as $user)
        <ul>
            <li>id : {{$user->id}}</li>
            <li>first_name : {{$user->first_name}}</li>
            <li>last_name : {{$user->last_name}}</li>
            <li>phone_number : {{$user->phone_number}}</li>
            <li>email : {{$user->email}}</li>
        </ul>
        <hr>
    @endforeach
@endsection