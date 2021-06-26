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
        $text = $telegram->getData();

        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => json_encode($text, 128)
        ]);
    }
}
