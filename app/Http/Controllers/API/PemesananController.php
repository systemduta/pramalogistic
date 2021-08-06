<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = Pemesanan::latest()->paginate(2);
        return response([
            'success' => true,
            'message' => 'List Semua Pemesanan',
            'data' => $pemesanan
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'no_telp' => 'required',
                'jenis_muatan' => 'required',
                'muat' => 'required',
                'bongkar' => 'required',
            ],
            [
                'nama.required' => 'masukan pemesanan',
                'no_telp.required' => 'masukan nomor telepon',
                'jenis_muatan.required' => 'masukan jenis muatan',
                'muat.required' => 'masukan kota muat',
                'bongkar.required' => 'masukan kota bongkar',
            ]
        );

        if ($validator->fails()) {
            return response([
                'success' => false,
                'message' => 'isi bidang yang kosong',
                'data' => $validator->errors()
            ], 400);
        } else {
            $pemesanan = Pemesanan::create([
                'nama' => $request->input('nama'),
                'no_telp' => $request->input('no_telp'),
                'jenis_muatan' => $request->input('jenis_muatan'),
                'muat' => $request->input('muat'),
                'bongkar' => $request->input('bongkar'),
            ], 200);
        }
        if ($pemesanan) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'data' => $pemesanan,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data gagal disimpan'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemesaan = Pemesanan::whereId($id)->first();

        if ($pemesaan) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Pemesanan',
                'data' => $pemesaan,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada Pemesanan',
                'data' => '',
            ], 200);
        }
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
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'no_telp' => 'required',
                'jenis_muatan' => 'required',
                'muat' => 'required',
                'bongkar' => 'required',
            ],
            [
                'nama.required' => 'masukan pemesanan',
                'no_telp.required' => 'masukan nomor telepon',
                'jenis_muatan.required' => 'masukan jenis muatan',
                'muat.required' => 'masukan kota muat',
                'bongkar.required' => 'masukan kota bongkar',
            ]
        );

        if ($validator->fails()) {
            return response([
                'success' => false,
                'message' => 'isi bidang yang kosong',
                'data' => $validator->errors()
            ], 400);
        } else {
            $edit = Pemesanan::findOrFail($id);
            $edit->update($request->all());
        }
        if ($edit) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'data' => $edit,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data gagal disimpan'
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemesanan = Pemesanan::whereId($id);
        $pemesanan->delete();

        if ($pemesanan) {
            return response()->json([
                'success' => true,
                'message' => 'Pemesanan berhasil di hapus',
            ], 200);
        }
    }
}
