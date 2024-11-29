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
@foreach ($courses as $course)
<ul>
    <li>
        <a href="{{route("admin.courses.show",[$course->id])}}">
            id : {{$course->id}}
        </a>
    </li>
    <li>title : {{$course->title}}</li>
    <li>category : {{$course->category->title}}</li>
    <li>description : {{$course->body}}</li>
    <li>status : {{$course->status}}</li>
    <li>publish_at : {{$course->publish_at}}</li>
    <li>is_private : {{$course->is_private}}</li>
    <li>updated_at : {{$course->updater?->full_name}}</li>
    <li>created_by : {{$course->creator?->full_name}}</li>
</ul>
<form class="mt-6" action="/admin/courses/delete/{{$course->id}}" method="POST">
    @csrf
    <button class="text-sm text-red-500">Delete</button>
</form>

<form class="mt-6" action="/admin/courses/{{$course->id}}/edit" method="GET">
    <button class="text-sm text-blue-500">Edit</button>
</form>
<hr>
@endforeach
@endsection