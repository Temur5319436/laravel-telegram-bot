<?php

namespace App\Http\Controllers;

use Telegram;
use App\Http\Requests\TelegramRequest;
use Exception;

class MainController extends Controller
{
    protected Telegram $telegram;

    public function __construct()
    {
        $this->telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
    }

    public function api(TelegramRequest $request)
    {
        $chatId = $this->telegram->ChatID();
        $data = $this->telegram->getData();

        try {
            $this->telegram->sendMessage([
                'chat_id' => 1622751454,
                'text' => 'json_encode($data, 128)'
            ]);
        } catch (Exception $exception) {
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
}
