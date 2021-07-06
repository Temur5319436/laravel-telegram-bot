<?php

namespace App\Http\Traits;

use Telegram;
use App\Models\Client;
use Illuminate\Support\Facades\Cache;

trait RegisterClient
{
    public function register(Telegram $telegram)
    {
        $data = $telegram->getData();
        $chatId = $data['message']['chat']['id'];
        $client = Client::where('chat_id', $chatId)->first();

        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => 'Xush kelibsiz!',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => '🔍 Tovarlarni qidirish']
                    ],
                    [
                        ['text' => '🏢 Filiallar']
                    ]
                ],
                'resize_keyboard' => true
            ])
        ]);
        Cache::put($chatId . ':stage', 'start');

        if ($client) return;

        $username = array_key_exists('username', $data['message']['chat']) ? $data['message']['chat']['username'] : null;
        $firstName = array_key_exists('first_name', $data['message']['chat']) ? $data['message']['chat']['first_name'] : null;
        $lastName = array_key_exists('last_name', $data['message']['chat']) ? $data['message']['chat']['last_name'] : null;

        Client::create([
            'chat_id' => $chatId,
            'username' => $username,
            'first_name' => $firstName,
            'last_name' => $lastName,
        ]);
    }
}
