<?php

namespace App\Http\Controllers\Admin;

use App\Enum\TicketStatusEnum;
use Exception;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        $title = 'Tickets list';

        return view('admin/tickets/index', compact('tickets', 'title'));
    }

    public function create()
    {
        return view('admin/tickets/create');
    }

    public function store(StoreTicketRequest $request)
    {
        try {
            $ticket = Ticket::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'body' => $request->body,
            ]);

            if (!$ticket) {
                throw new Exception('ticket can not create!');
            }

            return redirect()->route('admin.ticket.index')->with('success_message', 'ticket created successful!');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->route(route: 'admin.ticket.create')->with('error_message', 'ticket create failed!');
        }
    }

    // public function show(User $user)
    // {
    //     return view('admin/users/show', compact('user'));
    // }

    // public function edit(User $user)
    // {
    //     return view('admin/users/edit', compact('user'));
    // }

    // public function update(Request $request, User $user)
    // {
    //     try {
    //         $user->first_name = $request->first_name;
    //         $user->last_name = $request->last_name;
    //         $user->email = $request->email;
    //         $user->phone_number = $request->phone_number;
    //         $user->save();

    //         return redirect()->route('admin.user.index')->with('success_message', 'User Updated successful!');
    //     } catch (Exception $exception) {
    //         return redirect()->back()->with('error_message', 'User update failed!');
    //     }
    // }

    // public function destroy(User $user)
    // {
    //     try {
    //         $user->delete();

    //         return redirect()->route('admin.user.index')->with('success_message', 'User Deleted successful!');
    //     } catch (Exception $exception) {
    //         return redirect()->back()->with('error_message', 'User delete failed!');
    //     }
    // }
}
