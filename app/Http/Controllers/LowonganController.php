<?php

namespace App\Http\Controllers;

use App\Lowongan;
use App\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data['data'] = Lowongan::all();
        // dd($data);
        return view('admin.lowongan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                "nama" => 'required',
                "persyaratan" => 'required',
                "deskripsi" => "required",
                "batas_waktu" => "required",
                "gambar" => "required",
            ],
            [
                'nama.required' => 'Masukan Nama Karir',
                'persyaratan.required' => 'Masukan Persyaratan',
                'deskripsi.required' => 'Masukan Deskripsi',
            ]
        );

        $post = new  Lowongan();

        if ($request->has("gambar")) {
            $imageName = Str::uuid();
            $post->gambar = $imageName;
            ImageController::lowongan($request->file("gambar"), $imageName);
        }
        $post->nama = $request->nama;
        $post->persyaratan = $request->persyaratan;
        $post->deskripsi = $request->deskripsi;
        $post->batas_waktu = $request->batas_waktu;
        // dd($post);
        $post->save();

        Session::flash('message', 'Karir telah berhasil ditambahkan');
        return redirect()->route('lowongan');
    }


    public function pelamar()
    {
        $data['data'] = Pelamar::all();
        // dd($data);
        return view('admin.pelamar', $data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Pelamar::findOrFail($id);
        return view('admin.pelamar-show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
