<?php

namespace App\Http\Controllers;

use Telegram;
use App\Http\Requests\TelegramRequest;

class MainController extends Controller
{
    protected Telegram $telegram;

    public function __construct()
    {
        $this->telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
    }

    public function api(TelegramRequest $request)
    {
        try {
            $data = $this->telegram->getData();
            $firstName = $request->getFirstName();
            $lastName = $request->getLastName();
            $chatId = $request->getChatId();
            $message = $request->getMessage();
            $messageId = $request->getMessageId();
            $date = $request->getDate();

            $this->telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => json_encode($data, 128)
            ]);
        } catch (\Exception $exception) {
            // --------- Error -------- //
            $this->telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => json_encode([
                    'message' => $exception->getMessage(),
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine()
                ], 128)
            ]);
        }
    }

    // -------- Develop ------- //
    public function develop(TelegramRequest $request)
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
