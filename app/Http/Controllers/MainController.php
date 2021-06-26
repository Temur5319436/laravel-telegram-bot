<?php

namespace App\Http\Controllers;

use Telegram;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected Telegram $telegram;

    public function __construct()
    {
    }

    public function api(Request $request)
    {
        $this->telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
        $chatId = $request->getChatId();
        $message = $request->getMessage();
        $messageId = $request->getMessageId();
        $date = $request->getDate();

        try {
            $this->telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => $message
            ]);
        } catch (\Throwable $th) {
            $this->telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => $th->getMessage()
            ]);
        }
    }

    // -------- Develop ------- //
    public function develop(Request $request)
    {
        $chatId = $request->getChatId();
        $message = $request->getMessage();
        $messageId = $request->getMessageId();
        $date = $request->getDate();

        $this->telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => json_encode($request->toArray(), 128)
        ]);
    }
}
