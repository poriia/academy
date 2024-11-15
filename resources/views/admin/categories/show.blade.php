@extends('layouts.admin.admin_layout')

@section('body')
<ul>
    <li>user : {{$ticket->user->first_name}}</li>
    <li>first_name : {{$ticket->title}}</li>
    <li>last_name : {{$ticket->body}}</li>
    <li>status : {{$ticket->status}}</li>
</ul>

<hr>
<p class="mx-3 bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3">Replies :</p>


@foreach ($ticket->replies as $reply)
<ul class="mx-3">
    <li>user : {{$reply->user->first_name}}</li>
    <li>first_name : {{$reply->title}}</li>
    <li>last_name : {{$reply->body}}</li>
    <li>status : {{$reply->status}}</li>
</ul>

<hr>
@endforeach
<form action="/admin/reply/store" method="POST">
    @csrf
    <input type="hidden" id="ticket_id" name="ticket_id" value="{{$ticket->id}}"></input>

    <div class="space-y-12">
        @if ($errors->any())
        <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
            <p class="font-bold">Error message</p>
            @foreach ($errors->all() as $error)
            <p class="text-sm"> {{ $error }}</p>
            @endforeach
        </div>
        @endif
        @if (session('error_message'))
        <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
            <p class="font-bold">Error message</p>
            <p class="text-sm"> {{ session('error_message') }}</p>
        </div>
        @endif
        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">title</label>
                    <div class="mt-2">
                        <input id="title" name="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
                    </div>
                </div>
                <div class="col-span-full">
                    <label for="body" class="block text-sm font-medium leading-6 text-gray-900">body</label>
                    <div class="mt-2">
                        <textarea id="body" name="body" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
</form>

<hr>
@endsection