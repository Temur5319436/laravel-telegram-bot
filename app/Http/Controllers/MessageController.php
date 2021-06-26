<?php

namespace App\Http\Controllers;

use Telegram;
use App\Http\Requests\TelegramRequest;

class MessageController extends Controller
{
    public function api(TelegramRequest $request)
    {
        $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
        $chatId = $telegram->ChatID();

        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => json_encode($request->toArray(), 128)
        ]);
    }
}
