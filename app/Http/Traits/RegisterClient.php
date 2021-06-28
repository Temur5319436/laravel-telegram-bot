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
