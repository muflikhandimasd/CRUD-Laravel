<?php

namespace App\Http\Controllers\API;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pembeli;
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
            'email' => 'required'
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

        ];
    }
}
