<?php

namespace App\Http\Controllers;

use Telegram;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function api(Request $request)
    {
        $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
        $chatId = $request->getChatId();
        $message = $request->getMessage();
        $messageId = $request->getMessageId();
        $date = $request->getDate();
        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $message
        ]);
    }

    // -------- Develop ------- //
    public function develop(Request $request)
    {
    }
}
