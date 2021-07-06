<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Telegram;

class BranchController extends Controller
{
    public static function index(Telegram $telegram)
    {
        $chatId = $telegram->ChatID();
        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => 'message'
        ]);
        Cache::put($chatId . ':stage', 'branches');
    }
}
