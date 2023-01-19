<?php

namespace App\Http\Controllers\API;

use App\Models\Barang;
use App\Models\Pembeli;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PembelianController extends Controller
{
    public function createBarang(Request $request)
    {
        $input = $request->all();
        $rules = [
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $barang = Barang::create($input);
        return response()->json([
            'status' => true,
            'data' => $barang
        ]);
    }

    public function createPembeli(Request $request)
    {
        $input = $request->all();
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_hp' => 'required'
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $pembeli = Pembeli::create($input);
        return response()->json([
            'status' => true,
            'data' => $pembeli
        ]);
    }

    public function createPembelian(Request $request)
    {
        $input = $request->all();
        $rules = [
            'barang_id' => 'required',
            'pembeli_id' => 'required',
        ];


        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $barang = Barang::find($input['barang_id']);
        if (!$barang) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'barang not found'
                ],
                404
            );
        }

        $pembeli = Pembeli::find($input['pembeli_id']);
        if (!$pembeli) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'pembeli not found'
                ],
                404
            );
        }

        $pembelian = Pembelian::create([
            'barang_id' => $barang->id,
            'pembeli_id' => $pembeli->id,
            'tanggal_pembelian' => date('Y-m-d H:i:s')
        ]);
        return response()->json([
            'status' => true,
            'data' => $pembelian
        ]);
    }

    public function getDataPembeli($id)
    {

        $pembeli = Pembeli::find($id)->with('pembelians')->get();
        return response()->json([
            'status' => true,
            'data' => $pembeli
        ]);
    }
}
