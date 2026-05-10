<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plant;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all();

        return view('admin.plants', compact('plants'));
    }

    public function create()
    {
        return view('admin.create-plant');
    }

    public function store(Request $request)
    {
        $plant = Plant::create($request->all());

        $plant->qr_url = url('/plants/' . $plant->id);
        $plant->save();

        return redirect('/admin/plants')
            ->with('success', 'Plant added successfully!');
    }

    public function edit(Plant $plant)
    {
        return view('admin.edit-plant', compact('plant'));
    }

    public function update(Request $request, Plant $plant)
    {
        $plant->update($request->all());

        $plant->qr_url = url('/plants/' . $plant->id);
        $plant->save();

        return redirect('/admin/plants')
            ->with('success', 'Plant updated successfully!');
    }

    public function destroy(Plant $plant)
    {
        Plant::destroy($plant->id);

        return redirect('/admin/plants')
            ->with('success', 'Plant deleted successfully!');
    }
}
