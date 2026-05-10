<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Plant::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $plant = Plant::create($request->all());

        $plant->qr_url = url('/plants/' . $plant->id);
        $plant->save();

        $qr = QrCode::size(200)->generate($plant->qr_url);

        return response()->json([
            'plant' => $plant,
            'qr' => $qr
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Plant::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $plant = Plant::findOrFail($id);
        $plant->update($request->all());

        return response()->json($plant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Plant::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
