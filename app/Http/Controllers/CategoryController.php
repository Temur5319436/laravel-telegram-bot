<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryGetAllResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function switch()
    {
    }

    public function getAll()
    {
        return CategoryGetAllResource::collection(Category::get());
    }

    public function index()
    {
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
