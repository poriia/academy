@extends('layouts.admin.admin_layout')

@section('body')
<form action="/admin/users/store" method="POST">
    @csrf
    <div class="space-y-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">first_name</label>
                    <div class="mt-2">
                        <input id="first_name" name="first_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
                    </div>
                </div>
                <div class="col-span-full">
                    <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">last_name</label>
                    <div class="mt-2">
                        <input id="last_name" name="last_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
                    </div>
                </div>
                <div class="col-span-full">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">email</label>
                    <div class="mt-2">
                        <input id="email" name="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
                    </div>
                </div>
                <div class="col-span-full">
                    <label for="phone_number" class="block text-sm font-medium leading-6 text-gray-900">phone_number</label>
                    <div class="mt-2">
                        <input id="phone_number" name="phone_number" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
                    </div>
                </div>
                <div class="col-span-full">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">password</label>
                    <div class="mt-2">
                        <input id="password" name="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
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

@endsection