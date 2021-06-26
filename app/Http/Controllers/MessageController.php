<?php

namespace App\Http\Controllers;

use App\Http\Requests\TelegramRequest;
use Telegram;
use Illuminate\Http\Request;
use Telegram\Bot\TelegramRequest as BotTelegramRequest;

class MessageController extends Controller
{
    public function api(TelegramRequest $request)
    {
        $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
        $chatId = $telegram->ChatID();

        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => json_encode($request->get('message'), 128)
        ]);
    }
}
