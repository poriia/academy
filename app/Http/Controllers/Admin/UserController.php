<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $title = 'Users list';

        return view('admin/users/index', compact('users', 'title'));
    }


    public function create()
    {
        return view('admin/users/create');
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $user = User::create([
                'first_names' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ]);

            if (!$user) {
                throw new Exception('User can not create!');
            }

            return redirect()->route('admin.users.index');
        } catch (Exception $exception) {
            return redirect()->route('admin.users.create');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
