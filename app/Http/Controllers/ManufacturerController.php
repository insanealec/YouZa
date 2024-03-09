<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ManufacturerController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return Inertia::render('RoofMaxx/Manufacturers', [
      'manufacturers' => Manufacturer::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return Inertia::render('RoofMaxx/CreateManufacturer');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    Manufacturer::create($request->all());
    return redirect()->route('manufacturers.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Manufacturer $manufacturer)
  {
    return Inertia::render('RoofMaxx/Manufacturer', [
      'Manufacturer' => $manufacturer
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Manufacturer $manufacturer)
  {
    return Inertia::render('RoofMaxx/EditManufacturer', [
      'Manufacturer' => $manufacturer
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Manufacturer $manufacturer)
  {
    $manufacturer->update($request->all());
    return redirect()->route('manufacturers.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Manufacturer $manufacturer)
  {
    $manufacturer->delete();
    return redirect()->route('manufacturers.index');
  }
}
