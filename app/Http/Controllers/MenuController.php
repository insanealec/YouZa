<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return Inertia::render('Menu', ['categories'=> $categories]);
    }

    public function category(Request $requesti, $id)
    {
        return Inertia::render('Category', [
            'category'=> Category::findOrFail($id)->load('items')
        ]);
    }

    public function item(Request $request, $id)
    {
        return Inertia::render('Item', [
            'item'=> Item::findOrFail($id)
        ]);
    }
}
