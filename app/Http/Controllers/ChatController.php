<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Events\GreetingSend;
use Illuminate\Http\Request;
use App\Models\User;

class ChatController extends Controller
{
    public function showChat()
    {
        return view('chat.show');
    }
    public function messageReceived(Request $request)
    {
        $rules = [
            'message' => 'required',
        ];

        $request->validate($rules);

        broadcast(new MessageSend($request->user(), $request->message));

        return response()->json('Message broadcast');
    }

    public function greetReceiver(Request $request, User $receiver)
    {
        broadcast(new GreetingSend($receiver, "{$request->user()->name} hello you"));
        broadcast(new GreetingSend($request->user(), "You hi {$receiver->name}"));

        return "Hello {$request->user()->name} to {$receiver->name}";
    }
}
