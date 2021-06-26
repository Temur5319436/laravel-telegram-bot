<?php

namespace App\Http\Controllers;

use Telegram;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function api(Request $request)
    {
        $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
        $text = $telegram->Text();

        $telegram->sendMessage([
            'chat_id' => 1622751454,
            'text' => $text
        ]);
    }
}
