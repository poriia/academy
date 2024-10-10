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
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ]);

            if (!$user) {
                throw new Exception('User can not create!');
            }

            return redirect()->route('admin.user.index')->with('success_message', 'User created successful!');
        } catch (Exception $exception) {
            return redirect()->route('admin.user.create')->with('error_message', 'User create failed!');
        }
    }

    public function show(User $user)
    {
        return view('admin/users/show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin/users/edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->save();

            return redirect()->route('admin.user.index')->with('success_message', 'User Updated successful!');
        } catch (Exception $exception) {
            return redirect()->back()->with('error_message', 'User update failed!');
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();

            return redirect()->route('admin.user.index')->with('success_message', 'User Deleted successful!');
        } catch (Exception $exception) {
            return redirect()->back()->with('error_message', 'User delete failed!');
        }
    }
}
