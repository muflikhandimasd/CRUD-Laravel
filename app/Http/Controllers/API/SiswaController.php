<?php

namespace App\Http\Controllers\API;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return response()->json(
            [
                'status' => true,
                'data' => $siswas,
            ]
        );
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $rules = [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $validator->errors()
                ],
                400
            );
        }
    }
}
