<?php

namespace App\Http\Controllers;

use Telegram;
use App\Models\Product;

class ProductController extends Controller
{
    public static function search(Telegram $telegram)
    {
        $text = $telegram->Text();

        $products = Product::where('title', 'LIKE', "%$text%")
            ->orderBy('title')
            ->get();
        $message = '';
        foreach ($products as $key => $product) {
        }
    }
}
