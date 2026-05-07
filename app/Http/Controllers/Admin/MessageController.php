<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    function index()
    {
        $userId = auth()->user()->id;
        $chatUsers = Chat::with('senderProfile')->select(['sender_id'])
            ->where('receiver_id', $userId)
            ->where('sender_id', '!=', $userId)
            ->groupBy('sender_id')
            ->get();
        return view('admin.messenger.index', compact('chatUsers'));
    }
    function getMessage(Request $request)
    {
        $senderId = auth()->user()->id;
        $receiverId = $request->receiver_id;
        $message = Chat::whereIn('receiver_id', [$senderId, $receiverId])
            ->whereIn('sender_id', [$senderId, $receiverId])
            ->orderBy('created_at', 'asc')->get();
        return response($message);
    }
}
