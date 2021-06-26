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
        $firstName = $request->getFirstName();
        $lastName = $request->getLastName();
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
            // --------- Error -------- //
            $this->telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => $th->getMessage()
            ]);
        }
    }

    // -------- Develop ------- //
    public function develop(Request $request)
    {
        $firstName = $request->getFirstName();
        $lastName = $request->getLastName();
        $chatId = $request->getChatId();
        $message = $request->getMessage();
        $date = $request->getDate();

        $this->telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => json_encode($request->toArray(), 128)
        ]);
    }
}
