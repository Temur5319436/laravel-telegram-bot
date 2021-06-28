<?php

namespace App\Http\Traits;

use App\Models\Client;

trait RegisterClient
{
    public function register($data)
    {
        $chatId = $data['message']['chat']['id'];
        $client = Client::where('chat_id', $chatId)->first();
        if ($client) return;
        Client::create([
            'chat_id' => $chatId,
            'username' => $data['message']['chat']['username'],
            'first_name' => $data['message']['chat']['first_name'],
            'last_name' => $data['message']['chat']['last_name'],
        ]);
    }
}
