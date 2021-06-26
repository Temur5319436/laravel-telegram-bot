<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;

class MessageController extends Controller
{
    public function index()
    {
        $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'));
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
