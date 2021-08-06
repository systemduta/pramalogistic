<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $map = Map::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Map',
            'data' => $map
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
                'longitude' => 'required',
                'latitude' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'nama.required' => 'masukan nama kota',
                'longitude.required' => 'masukan longitude',
                'latitude.required' => 'masukan latitude',
                'deskripsi.required' => 'masukan deskripsi',
            ]
        );

        if ($validator->fails()) {
            return response([
                'success' => false,
                'message' => 'isi bidang yang kosong',
                'data' => $validator->errors()
            ], 400);
        } else {
            $map = Map::create([
                'nama' => $request->input('nama'),
                'longitude' => $request->input('longitude'),
                'latitude' => $request->input('latitude'),
                'deskripsi' => $request->input('deskripsi'),
            ], 200);
        }
        if ($map) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'data' => $map,
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
        $map = Map::whereId($id)->first();

        if ($map) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Map',
                'data' => $map,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada data Map',
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
                'longitude' => 'required',
                'latitude' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'nama.required' => 'masukan nama kota',
                'longitude.required' => 'masukan longitude',
                'latitude.required' => 'masukan latitude',
                'deskripsi.required' => 'masukan deskripsi',
            ]
        );

        if ($validator->fails()) {
            return response([
                'success' => false,
                'message' => 'isi bidang yang kosong',
                'data' => $validator->errors()
            ], 400);
        } else {
            $edit = Map::findOrFail($id);
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
        $map = Map::whereId($id);
        $map->delete();

        if ($map) {
            return response()->json([
                'success' => true,
                'message' => 'Map berhasil di hapus',
            ], 200);
        }
    }
}
