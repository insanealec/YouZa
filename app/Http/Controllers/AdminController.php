<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
  public function index(Request $request)
  {
    return Inertia::render('Admin/Dashboard', [
      'menus' => Menu::all(),
      'categories' => Category::all(),
      'items' => Item::all()
    ]);
  }

  public function showMenu(Request $request, $id = null)
  {
    return Inertia::render('Admin/Edit/Menu', [
      'menu' => $id ? Menu::find($id) : null
    ]);
  }

  public function editMenu(Request $request)
  {
    $menu = Menu::updateOrCreate(['id' => $request->input('id')], $request->all());
    return $menu; //redirect()->route('admin.show.menu', ['id' => $menu->id]);
  }

  public function showCategory(Request $request, $id = null)
  {
    return Inertia::render('Admin/Edit/Category', [
      'category' => $id ? Category::find($id) : null
    ]);
  }

  public function showItem(Request $request, $id = null)
  {
    return Inertia::render('Admin/Edit/Item', [
      'item' => $id ? Item::find($id) : null
    ]);
  }

}
