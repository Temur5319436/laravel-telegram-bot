<?php

namespace App\Http\Controllers;

use Telegram;
use App\Http\Traits\RegisterClient;
use App\Http\Requests\TelegramRequest;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    use RegisterClient;

    protected Telegram $telegram;

    public function __construct()
    {
        $this->telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
    }

    public function api(TelegramRequest $request)
    {
        $chatId = $this->telegram->ChatID();
        $text = $this->telegram->Text();
        try {
            $stage = Cache::get($chatId . ':stage');
            switch ($text) {
                case '/start':
                    $this->register($this->telegram);
                    Cache::put($chatId . ':stage', 'start');
                    break;
            }
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
