<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Regional;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return response()->json($areas);
    }

    public function getAreaByRegional($id)
    {
        $regional = Regional::find($id);
        if (!$regional) {
            return response()->json([
                'message' => 'Regional tidak ditemukan !'
            ], 404);
        }
        $areas = Area::where('regional_id', $id)->get();
        return response()->json($areas);
    }

    public function show($id)
    {
        $area = Area::find($id);

        if (!$area) {
            return response()->json([
                'message' => 'Area tidak ditemukan !'
            ], 404);
        }

        return response()->json($area);
    }

    public function store(Request $request)
    {
        $request->validate([
            'regional_id' => 'required',
            'nama_area' => 'required|string|max:255',
        ]);

        $existingRegional = Regional::find($request->regional_id);
        if (!$existingRegional) {
            return response()->json([
                'message' => 'Regional tidak ditemukan !'
            ], 404);
        }

        $area = Area::create([
            'regional_id' => $request->regional_id,
            'nama_area' => $request->nama_area,
        ]);

        return response()->json([
            'message' => 'Area berhasil disimpan !',
            'data' => $area
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $area = Area::find($id);

        if (!$area) {
            return response()->json([
                'message' => 'Area tidak ditemukan !'
            ], 404);
        }

        $request->validate([
            'regional_id' => 'required',
            'nama_area' => 'required|string|max:255',
        ]);

        $existingRegional = Regional::find($request->regional_id);
        if (!$existingRegional) {
            return response()->json([
                'message' => 'Regional tidak ditemukan !'
            ], 404);
        }

        $data = [
            'regional_id' => $request->regional_id,
            'nama_area' => $request->nama_area,
        ];
        $area->update($data);
        return response()->json([
            'message' => 'Area berhasil diupdate !',
            'data' => $area
        ]);
    }

    public function destroy($id)
    {
        $area = Area::find($id);

        if (!$area) {
            return response()->json([
                'message' => 'Area tidak ditemukan !'
            ], 404);
        }
        $area->delete();
        return response()->json([
            'message' => 'Area berhasil dihapus !'
        ]);
    }
}
