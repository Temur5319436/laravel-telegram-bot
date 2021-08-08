<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use Telegram;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public static function switch(Telegram $telegram)
    {
        $chatId = $telegram->ChatID();
        $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => '🔍 Tovar nomini yozing...',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => '◀️ Qaytish']]
                ],
                'resize_keyboard' => true
            ])
        ]);
        Cache::put($chatId . ':stage', 'products_search');
    }

    public function index()
    {
        sleep(1);
        $search = request('search', '');
        $categoryId = request('category_id', null);
        $products = Product::where(function ($query) use ($search) {
            $query->orWhere('title', 'LIKE', "%$search%")
                ->orWhere('code', 'LIKE', "%$search%");
        })
            ->where('category_id', $categoryId ? '=' : '!=', $categoryId)
            ->orderByDesc('id')
            ->paginate(env("PG"));
        return ProductResource::collection($products);
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

    public static function search(Telegram $telegram)
    {
    }

    public function changeActive(Product $product)
    {
        $product->update(['active' => !$product['active']]);
        return response()->json(['message' => env("MESSAGE_OK")], 200);
    }
}
