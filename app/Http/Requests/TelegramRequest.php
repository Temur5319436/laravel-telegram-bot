<?php

namespace App\Http\Requests;

use Exception;
use Illuminate\Foundation\Http\FormRequest;

class TelegramRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'update_id' => 'required|integer',
            'message.message_id' => 'required|integer',
            'message.from' => 'required',
            'message.chat' => 'required',
            'message.date' => 'required|integer',
            'message.text' => 'required|string',
        ];
    }

    protected $timeDifference = 18000;

    public function getFirstName(): string
    {
        $all = $this->request->all();
        if (!array_key_exists('message', $all)) return null;
        if (!array_key_exists('from', $all['message'])) return null;
        if (!array_key_exists('first_name', $all['message']['from'])) return null;
        return $all['message']['from']['first_name'];
    }

    public function getLastName(): string
    {
        $all = $this->request->all();
        if (!array_key_exists('message', $all)) return null;
        if (!array_key_exists('from', $all['message'])) return null;
        if (!array_key_exists('last_name', $all['message']['from'])) return null;
        return $all['message']['from']['last_name'];
    }

    public function getChatId(): int
    {
        $all = $this->request->all();
        if (!array_key_exists('message', $all)) return null;
        if (!array_key_exists('chat', $all['message'])) return null;
        if (!array_key_exists('id', $all['message']['chat'])) return null;
        return $all['message']['chat']['id'];
    }

    public function getMessage(): string
    {
        $all = $this->request->all();
        if (!array_key_exists('message', $all)) return null;
        if (!array_key_exists('text', $all['message'])) return null;
        return $all['message']['text'];
    }

    public function getMessageId(): int
    {
        $all = $this->request->all();
        if (!array_key_exists('message', $all)) return null;
        if (!array_key_exists('id', $all['message'])) return null;
        return $all['message']['message_id'];
    }

    public function getDate()
    {
        $all = $this->request->all();
        if (!array_key_exists('message', $all)) return null;
        if (!array_key_exists('date', $all['message'])) return null;
        return date('Y-m-d H:i:s', $all['message']['date'] + $this->timeDifference);
    }
}
