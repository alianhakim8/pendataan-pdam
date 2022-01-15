<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagihanController extends Controller
{

    public function index()
    {
        // menampilkan seluruh data tagihan
        $data = Tagihan::all();
        return response()->json([
            'status' => 'semua data tagihan',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        // menambahkan data tagihan baru
        $meter_kubik = $request->post('meter_kubik');

        if ($meter_kubik <= 10) {
            $jml_tagihan = 2000 * $meter_kubik;
        } else if ($meter_kubik >= 20) {
            $jml_tagihan = 3000 * $meter_kubik;
        } else if ($meter_kubik <= 30) {
            $jml_tagihan = 5000 * $meter_kubik;
        } else {
            $jml_tagihan = 8000 * $meter_kubik;
        }

        $validator = Validator::make($request->all(), [
            'id_pelanggan' => 'required',
            'meter_kubik' => 'required',
            'tahun' => 'required',
            'bulan' => 'required',
            'jml_bayar' => 'required',
            'tgl_bayar' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'gagal',
                'message' => $validator->errors()
            ]);
        }

        // $data = new Tagihan();
        // $data->id_pelanggan = $request->post('id_pelanggan');
        // $data->tahun = $request->post('tahun');
        // $data->bulan = $request->post('bulan');
        // $data->meter_kubik = $request->post('meter_kubik');
        // $data->jml_bayar = $request->post('jml_bayar');
        // $data->jml_tagih = $jml_tagihan;
        // $data->tgl_bayar = $request->post('tgl_bayar');

        // $data->save();

        $data = new Tagihan();
        $data->id_pelanggan = $request->input('id_pelanggan');
        $data->tahun = $request->input('tahun');
        $data->bulan = $request->input('bulan');
        $data->meter_kubik = $request->input('meter_kubik');
        $data->jml_bayar = $request->input('jml_bayar');
        $data->jml_tagih = $jml_tagihan;
        $data->tgl_bayar = $request->input('tgl_bayar');

        $data->save();

        return response()->json([
            'status' => 'data berhasil disimpan'
        ]);
    }

    public function show($id)
    {
        // menampilkan data tagihan berdasarkan id
        $data = Tagihan::find($id);

        if ($data != null) {
            return response()->json([
                'status' => 'data tagihan berdasarkan id',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => 'data tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        // update data tagihan
        $data = Tagihan::find($id);

        $meter_kubik = $request->post('meter_kubik');

        if ($meter_kubik <= 10) {
            $jml_tagihan = 2000 * $meter_kubik;
        } else if ($meter_kubik >= 20) {
            $jml_tagihan = 3000 * $meter_kubik;
        } else if ($meter_kubik <= 30) {
            $jml_tagihan = 5000 * $meter_kubik;
        } else {
            $jml_tagihan = 8000 * $meter_kubik;
        }

        $validator = Validator::make($request->all(), [
            'id_pelanggan' => 'required',
            'meter_kubik' => 'required',
            'tahun' => 'required',
            'bulan' => 'required',
            'jml_bayar' => 'required',
            'tgl_bayar' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'gagal',
                'message' => $validator->errors()
            ]);
        }

        if ($data != null) {
            $data->id_pelanggan = $request->post('id_pelanggan');
            $data->tahun = $request->post('tahun');
            $data->bulan = $request->post('bulan');
            $data->meter_kubik = $request->post('meter_kubik');
            $data->jml_bayar = $request->post('jml_bayar');
            $data->jml_tagih = $jml_tagihan;
            $data->tgl_bayar = $request->post('tgl_bayar');
            $data->update();

            return response()->json([
                'status' => 'data berhasil diubah'
            ]);
        } else {
            return response()->json([
                'status' => 'data tidak ditemukan'
            ], 404);
        }
    }

    public function destroy($id)
    {
        // menghapus data tagihan berdasarkan id
        $data = Tagihan::find($id);

        if ($data != null) {
            $data->delete();
            return response()->json([
                'status' => 'hapus data berdasarkan id',
                'message' => 'data berhasil di hapus'
            ]);
        } else {
            return response()->json([
                'status' => 'data tidak ditemukan',
            ], 404);
        }
    }
}
