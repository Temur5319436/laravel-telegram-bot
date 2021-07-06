<?php

namespace App\Http\Controllers;

use Telegram;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public static function index(Telegram $telegram)
    {
        $chatId = $telegram->ChatID();
        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => '🔍 Tovar nomini yozing...',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => 'Qaytish']]
                ],
                'resize_keyboard' => true
            ])
        ]);
        Cache::put($chatId . ':stage', 'products_search');
    }

    public static function search()
    {
    }
}
