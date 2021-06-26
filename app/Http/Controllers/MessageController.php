<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Telegram;

class MessageController extends Controller
{
    public function index()
    {
        $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
        $chatId = $telegram->ChatID();
        $text = $telegram->Text();

        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $text);
        fclose($myfile);

        // $telegram->sendMessage([
        //     'chat_id' => $chatId,
        //     'text' => $text
        // ]);
    }

    public function store(Request $request)
    {
        $text = 'store';
        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $text);
        fclose($myfile);
    }

    public function show($id)
    {
        $text = 'show';
        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $text);
        fclose($myfile);

    }

    public function update(Request $request, $id)
    {
        $text = 'put';
        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $text);
        fclose($myfile);

    }

    public function destroy($id)
    {
        $text = 'delete';
        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $text);
        fclose($myfile);

    }
}
