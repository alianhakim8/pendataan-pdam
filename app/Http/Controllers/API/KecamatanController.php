<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KecamatanResource;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KecamatanController extends Controller
{
    public function index()
    {
        $data = Kecamatan::latest()->get();
        return response()->json([KecamatanResource::collection($data), 'Data Fecthed']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kecamatan' => 'required|max:255',
            'kode_pos' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $kecamatan = Kecamatan::create([
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos
        ]);

        return response()->json(['Kecamatan sudah dibuat', new KecamatanResource($kecamatan)]);
    }

    public function show($id)
    {
        $kecamatan = Kecamatan::find($id);
        if (is_null($kecamatan)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new KecamatanResource($kecamatan)]);
    }

    public function update(Request $request, Kecamatan $kecamatan)
    {
        $validator = Validator::make($request->all(), [
            'kecamatan' => 'required|string|max:255',
            'kode_pos' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $kecamatan->kecamatan = $request->kecamatan;
        $kecamatan->kode_pos = $request->kode_pos;
        $kecamatan->save();

        return response()->json(['Kecamatan sudah diupdate.', new KecamatanResource($kecamatan)]);
    }

    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();

        return response()->json('Kecamatan sudah dihapus');
    }
}
