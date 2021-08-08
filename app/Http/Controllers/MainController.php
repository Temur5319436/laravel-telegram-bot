<?php

namespace App\Http\Controllers;

use Telegram;
use App\Http\Traits\RegisterClient;
use App\Http\Requests\TelegramRequest;
use App\Http\Traits\BackButton;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    use RegisterClient,
        BackButton;

    protected Telegram $telegram;

    public function __construct()
    {
        $this->telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
    }

    public function api(TelegramRequest $request)
    {
        $chatId = $this->telegram->ChatID();
        $text = $this->telegram->Text();
        $data = $this->telegram->getData();
        $this->telegram->sendMessage([
            'chat_id' => '@developer_tester',
            'text' => json_encode($data, 128)
        ]);
        $file = fopen('t.txt', 'a');
        fwrite($file, json_encode($data, 128));
        fclose($file);
        return;
        try {
            $stage = Cache::get($chatId . ':stage');

            if ($text == '/start') {
                $this->register($this->telegram);
                return;
            } else if ($text == '🔍 Tovarlarni qidirish') {
                ProductController::switch($this->telegram);
            } else if ($text == '🏢 Filiallar') {
                BranchController::switch($this->telegram);
            } else if ($text == '◀️ Qaytish') {
                $this->back($this->telegram);
            }

            switch ($stage) {
                case 'products_search':
                    ProductController::search($this->telegram);
                    break;
                case '':
                    break;
            }
        } catch (\Exception $exception) {
            $this->telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => json_encode([
                    'message' => $exception->getMessage(),
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine()
                ], 128)
            ]);
        }
    }
}
