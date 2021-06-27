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
        $data = $this->telegram->getData();
        $firstName = $this->telegram->FirstName();
        $lastName = $this->telegram->LastName();
        $chatId = $this->telegram->ChatID();
        $text = $this->telegram->Text();
        $messageId = $this->telegram->MessageID();
        $date = $this->telegram->Date();

        try {
            $this->telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => json_encode($data, 128)
            ]);
        } catch (\Exception $exception) {
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
}
