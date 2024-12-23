<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Area;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        return response()->json($units);
    }

    public function getUnitByArea($id)
    {
        $area = Area::find($id);
        if (!$area) {
            return response()->json([
                'message' => 'Area tidak ditemukan!'
            ], 404);
        }
        $units = Unit::where('area_id', $id)->get();
        return response()->json($units);
    }

    public function show($id)
    {
        $unit = Unit::find($id);
        if (!$unit) {
            return response()->json([
                'message' => 'Unit tidak ditemukan!'
            ], 404);
        }
        return response()->json($unit);
    }

    public function store(Request $request)
    {
        $request->validate([
            'area_id' => 'required',
            'nama_unit' => 'required|string|max:255',
        ]);

        $existingArea = Area::find($request->area_id);
        if (!$existingArea) {
            return response()->json([
                'message' => 'Area tidak ditemukan!'
            ], 404);
        }

        $unit = Unit::create([
            'area_id' => $request->area_id,
            'nama_unit' => $request->nama_unit,
        ]);


        return response()->json([
            'message' => 'Unit berhasil disimpan!',
            'data' => $unit
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::find($id);
        if (!$unit) {
            return response()->json([
                'message' => 'Unit tidak ditemukan!'
            ], 404);
        }
        $request->validate([
            'area_id' => 'required',
            'nama_unit' => 'required|string|max:255',
        ]);

        $existingArea = Area::find($request->area_id);
        if (!$existingArea) {
            return response()->json([
                'message' => 'Area tidak ditemukan!'
            ], 404);
        }

       $data = [
            'area_id' => $request->area_id,
            'nama_unit' => $request->nama_unit,
        ];

        $unit->update($data);

        return response()->json([
            'message' => 'Unit berhasil diupdate!',
            'data' => $unit
        ]);
    }

    public function destroy($id)
    {
        $unit = Unit::find($id);
        if (!$unit) {
            return response()->json([
                'message' => 'Unit tidak ditemukan!'
            ], 404);
        }
        $unit->delete();
        return response()->json([
            'message' => 'Unit berhasil dihapus!'
        ]);
    }
}
