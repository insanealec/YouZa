<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/Dashboard', [
          'categories'=> Category::all(),
          'items'=> Item::all()
        ]);
    }
}
