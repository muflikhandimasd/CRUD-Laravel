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

    public function show($id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'data not found'
                ],
                404
            );
        }
        return response()->json(
            [
                'status' => true,
                'data' => $siswa
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

        $siswa = Siswa::create(
            [
                'nama' => $data['nama'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'umur' => $data['umur'],
                'alamat' => $data['alamat'],
            ]
        );

        return response()->json([
            'status' => true,
            'data' => $siswa,
        ]);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'data not found'
                ],
                404
            );
        }
        $siswa->update($request->only('nama', 'jenis_kelamin', 'umur', 'alamat'));
        return response()->json([
            'status' => true,
            'data' => $siswa,
        ]);
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'data not found'
                ],
                404
            );
        }
        $siswa->delete();
        return response()->json([
            'status' => true,
            'message' => 'data succcessfully deleted'
        ]);
    }
}
