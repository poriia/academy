@extends('layouts.admin.admin_layout')

@section('body')
<ul>
    <li>title : {{$course->title}}</li>
    <li>category : {{$course->category->title}}</li>
    <li>description : {{$course->body}}</li>
    <li>status : {{$course->status}}</li>
    <li>publish_at : {{$course->publish_at}}</li>
    <li>is_private : {{$course->is_private}}</li>
    <li>updated_at : {{$course->updated_at}}</li>
    <li>created_by : {{$course->created_by}}</li>
    <li>updated_by : {{$course->updated_by}}</li>
</ul>

<hr>
@endsection