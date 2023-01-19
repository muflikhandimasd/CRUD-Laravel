<?php

namespace App\Http\Controllers\WEB;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebSiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswas.index', compact('siswas'));
    }
}
