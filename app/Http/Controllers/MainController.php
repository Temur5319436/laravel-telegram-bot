<?php

namespace App\Http\Controllers;

use Telegram;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected Telegram $telegram;

    public function __construct()
    {
        $this->telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));   
    }
    public function api(Request $request)
    {
        $chatId = $request->getChatId();
        $message = $request->getMessage();

        $this->telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $message
        ]);
    }

    // -------- Develop ------- //
    public function develop(Request $request)
    {
        $chatId = $request->getChatId();
        $message = $request->getMessage();

        $this->telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => json_encode($request->toArray(), 128)
        ]);
    }
}
