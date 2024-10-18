<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTicketReplyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\TicketReply;
use Exception;

class TicketReplyController extends Controller
{
    public function store(StoreTicketReplyRequest $request)
    {
        try {
            $ticket = TicketReply::create([
                'user_id' => auth()->user()->id,
                'ticket_id' => $request->ticket_id,
                'title' => $request->title,
                'body' => $request->body,
            ]);

            if (!$ticket) {
                throw new Exception('reply can not create!');
            }

            return redirect()->route('admin.ticket.show', [$request->ticket_id])->with('success_message', 'reply created successful!');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->route('admin.ticket.show', [$request->ticket_id])->with('error_message', 'reply create failed!');
        }
    }
}
