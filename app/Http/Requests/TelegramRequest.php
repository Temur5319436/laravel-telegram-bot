<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class TelegramRequest extends Request
{
    protected $timeDifference = 18000;

    public function getFirstName()
    {
        $all = $this->request->all();
        if (!array_key_exists('message', $all)) return null;
        if (!array_key_exists('from', $all['message'])) return null;
        if (!array_key_exists('first_name', $all['message']['from'])) return null;
        return $all['message']['from']['first_name'];
    }

    public function getLastName()
    {
        $all = $this->request->all();
        if (!array_key_exists('message', $all)) return null;
        if (!array_key_exists('from', $all['message'])) return null;
        if (!array_key_exists('last_name', $all['message']['from'])) return null;
        return $all['message']['from']['last_name'];
    }

    public function getChatId()
    {
        $all = $this->request->all();
        if (!array_key_exists('message', $all)) return null;
        if (!array_key_exists('chat', $all['message'])) return null;
        if (!array_key_exists('id', $all['message']['chat'])) return null;
        return $all['message']['chat']['id'];
    }

    public function getMessage()
    {
        $all = $this->request->all();
        if (!array_key_exists('message', $all)) return null;
        if (!array_key_exists('text', $all['message'])) return null;
        return $all['message']['text'];
    }

    public function getMessageId()
    {
        $all = $this->request->all();
        if (!array_key_exists('message', $all)) return null;
        if (!array_key_exists('id', $all['message'])) return null;
        return $all['message']['id'];
    }

    public function getDate()
    {
        $all = $this->request->all();
        if (!array_key_exists('message', $all)) return null;
        if (!array_key_exists('date', $all['message'])) return null;
        return date('Y-m-d H:i:s', $all['message']['date'] + $this->timeDifference);
    }
}
