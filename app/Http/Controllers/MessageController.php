<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Telegram;

class MessageController extends Controller
{
    public function index()
    {
        $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
        $chatId = $telegram->ChatID();
        $text = $telegram->Text();

        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $text
        ]);
    }

    public function store(Request $request)
    {
        $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
        $chatId = $telegram->ChatID();
        $text = $telegram->Text();

        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $text
        ]);
    }

    public function show($id)
    {
        $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
        $chatId = $telegram->ChatID();
        $text = $telegram->Text();

        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $text
        ]);
    }

    public function update(Request $request, $id)
    {
        $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
        $chatId = $telegram->ChatID();
        $text = $telegram->Text();

        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $text
        ]);

    }

    public function destroy($id)
    {
        $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
        $chatId = $telegram->ChatID();
        $text = $telegram->Text();

        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $text
        ]);

    }
}
