<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class TelegramRequest extends Request
{
    public function toArray()
    {
        parent::toArray();
    }
}
