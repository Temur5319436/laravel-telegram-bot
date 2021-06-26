<?php

namespace App\Http\Controllers;

use Telegram;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function api(Request $request)
    {
        $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
        $chatId = $telegram->ChatID();

        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => json_encode($request->get('chat'), 128)
        ]);
    }
}
