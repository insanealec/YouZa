<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Menu');
    }

    public function item(Request $request, $id)
    {
        return Inertia::render('Item', [
            'item'=> Item::findOrFail($id)
        ]);
    }
}
