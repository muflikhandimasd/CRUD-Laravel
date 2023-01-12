<?php

namespace App\Http\Controllers\API;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
