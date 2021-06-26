<?php

namespace App\Http\Controllers;

use Telegram;
use App\Http\Requests\TelegramRequest;

class MainController extends Controller
{
    protected $telegram;

    public function __construct()
    {
        $this->telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
    }
    public function api(TelegramRequest $telegramRequest)
    {
        try {
            $firstName = $telegramRequest->getFirstName();
            $lastName = $telegramRequest->getLastName();
            $chatId = $telegramRequest->getChatId();
            $message = $telegramRequest->getMessage();
            $messageId = $telegramRequest->getMessageId();
            $date = $telegramRequest->getDate();

            $this->telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => $message
            ]);
        } catch (\Exception $exception) {
            // --------- Error -------- //
            return response()->json([
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine()
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
