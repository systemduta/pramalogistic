<?php

namespace App\Http\Controllers;


use App\Lowongan;
use App\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class KarirController extends Controller
{
    public function index()
    {
        $data['data'] = Lowongan::all();
        return view('karir', $data);
    }
    public function daftar()
    {
        $data['data'] = Lowongan::all();
        return view('daftar', $data);
    }

    public function pelamar(Request $request)
    {
        $this->validate(
            $request,
            [
                "posisi" => 'required|exists:lowongans,id',
                "nama" => 'required',
                "tmptlahir" => 'required',
                "tlahir" => 'required',
                "alamat" => 'required',
                "email" => 'required',
                "telepon" => 'required',
                "gender" => 'required',
                "pterakhir" => 'required',
                "jurusan" => 'required',
                "upcv" => 'required|mimes:pdf|max:2048',
                "upportofolio" => 'required|mimes:pdf|max:2048',
                "upktp" => 'required|mimes:png,jpg|max:2048',
            ],
        );

        $posisi = Lowongan::find($request->posisi);
        $post = new  Pelamar();

        if ($request->has("upktp")) {
            $imageName = Str::uuid();
            $post->upktp = $imageName;
            ImageController::profile($request->file("upktp"), $imageName);
        }

        if ($request->has("upcv")) {
            $upcv = Str::uuid();
            $post->upcv = $upcv;
            PDFController::pdf($request->file("upcv"), $upcv);
        }

        if ($request->has("upportofolio")) {
            $upportofolio = Str::uuid();
            $post->upportofolio = $upportofolio;
            PDFController::pdf($request->file("upportofolio"), $upportofolio);
        }

        $post->posisi = $posisi->id;
        $post->nama = $request->nama;
        $post->tmptlahir = $request->tmptlahir;
        $post->tlahir = $request->tlahir;
        $post->alamat = $request->alamat;
        $post->email = $request->email;
        $post->telepon = $request->telepon;
        $post->gender = $request->gender;
        $post->pterakhir = $request->pterakhir;
        $post->jurusan = $request->jurusan;
        // dd($post);
        $post->save();

        Session::flash('message', 'Lamaran telah berhasil terkirim');
        return redirect()->route('karir');
    }
}
