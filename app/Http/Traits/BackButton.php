<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Cache;
use Telegram;

trait BackButton
{
    protected static function back(Telegram $telegram)
    {
        $chatId = $telegram->ChatID();
        $stage = Cache::get($chatId . ':stage');

        if ($stage == 'products_search') {
        } else if ($stage == '') {
        }
    }
}
