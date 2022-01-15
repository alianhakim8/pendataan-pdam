<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PelangganResource;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    //
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pelanggan::with('kecamatan')->latest()->get();
        return response()->json([PelangganResource::collection($data), 'pelanggan fetched.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'no_pelanggan' => 'required',
            'nama' => 'required',
            'telepon' => 'required',
            'no_ktp' => 'required',
            'no_kk' => 'required',
            'gender' => 'required',
            'id_kecamatan' => 'required',
            'id_kelurahan' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'alamat' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $pelanggan = Pelanggan::create([
            'id' => $request->id,
            'no_pelanggan' => $request->no_pelanggan,
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'no_ktp' => $request->no_ktp,
            'no_kk' => $request->no_kk,
            'gender' => $request->gender,
            'id_kecamatan' => $request->id_kecamatan,
            'id_kelurahan' => $request->id_kelurahan,
            'rw' => $request->rw,
            'rt' => $request->rt,
            'alamat' => $request->alamat,
        ]);

        return response()->json(['pelanggan created successfully.', new PelangganResource($pelanggan)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::with('kecamatan')->find($id);
        if (is_null($pelanggan)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new pelangganResource($pelanggan)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,   Pelanggan $pelanggan)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'no_pelanggan' => 'required',
            'nama' => 'required',
            'telepon' => 'required',
            'no_ktp' => 'required',
            'no_kk' => 'required',
            'gender' => 'required',
            'id_kecamatan' => 'required',
            'id_kelurahan' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'alamat' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $pelanggan->id = $request->id;
        $pelanggan->no_pelanggan = $request->no_pelanggan;
        $pelanggan->nama = $request->nama;
        $pelanggan->telepon = $request->telepon;
        $pelanggan->no_ktp = $request->no_ktp;
        $pelanggan->no_kk = $request->no_kk;
        $pelanggan->gender = $request->gender;
        $pelanggan->id_kecamatan = $request->id_kecamatan;
        $pelanggan->id_kelurahan = $request->id_kelurahan;
        $pelanggan->rw = $request->rw;
        $pelanggan->rt = $request->rt;
        $pelanggan->alamat = $request->alamat;

        $pelanggan->save();


        return response()->json(['pelanggan updated successfully.', new PelangganResource($pelanggan)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return response()->json('pelanggan deleted successfully');
    }
}
