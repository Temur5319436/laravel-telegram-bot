<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Telegram;

class MessageController extends Controller
{
    public function index()
    {
        $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));

        $telegram->sendMessage([
            'chat_id' => 1622751454,
            'text' => "text"
        ]);
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
