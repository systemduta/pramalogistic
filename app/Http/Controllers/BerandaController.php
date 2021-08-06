<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $data = Image::where('nama', 'karir')->get();
        // dd($data);
        return view('beranda', $data);
    }
}
