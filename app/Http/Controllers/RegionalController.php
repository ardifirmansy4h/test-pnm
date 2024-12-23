<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regional;

class RegionalController extends Controller
{

      public function index()
      {
          $regionals = Regional::all();
          return response()->json($regionals);
      }

      public function show($id)
      {
          $regional = Regional::find($id);

          if (!$regional) {
              return response()->json([
                  'message' => 'Regional tidak ditemukan !'
              ], 404);
          }
          return response()->json($regional);
      }

      public function store(Request $request)
      {
          $request->validate([
              'nama_regional' => 'required|string|max:255',
          ]);

          $regional = Regional::create([
              'nama_regional' => $request->nama_regional,
          ]);

          return response()->json([
              'message' => 'Data berhasil disimpan !',
              'data' => $regional
          ], 201);
      }

      public function update(Request $request, $id)
      {
          $regional = Regional::find($id);

          if (!$regional) {
              return response()->json([
                  'message' => 'Regional tidak ditemukan !'
              ], 404);
          }

          $request->validate([
              'nama_regional' => 'required|string|max:255',
          ]);

          $regional->nama_regional = $request->nama_regional;
          $regional->save();

          return response()->json([
              'message' => 'Regional berhasil diupdate !',
              'data' => $regional
          ]);
      }

      public function destroy($id)
      {
          $regional = Regional::find($id);

          if (!$regional) {
              return response()->json([
                  'message' => 'Regional tidak ditemukan !'
              ], 404);
          }

          $regional->delete();

          return response()->json([
              'message' => 'Regional berhasil dihapus !'
          ]);
      }
}
