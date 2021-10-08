<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $data['data'] = Berita::latest()->get();
        return view('berita', $data);
    }

    public function berita()
    {
        $data['data'] = Berita::all();
        return view('admin.berita', $data);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                "nama" => 'required',
                "gambar" => 'required|mimes:png,jpg|max:2048',
                "deskripsi" => 'required|string',
            ]
        );

        $post = new Berita();

        if ($request->has("gambar")) {
            $file = $request->file("gambar");
            $imageName = Str::uuid().'.'.$file->getClientOriginalExtension();
            $post->gambar = $imageName;
            ImageController::berita($file, $imageName);
        }

        $post->nama = $request->nama;
        $post->deskripsi = $request->deskripsi;
        // dd($post);
        $post->save();

        Session::flash('message', 'Berita telah berhasil ditambahkan');
        return redirect()->route('berita');
    }
}
