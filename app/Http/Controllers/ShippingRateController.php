<?php

namespace App\Http\Controllers;

use App\ShippingRate;
use Illuminate\Http\Request;

class ShippingRateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_index()
    {
        $rate = ShippingRate::all();
        return response()->view('admin.shipping_rates', [
            'data' => $rate
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rate = ShippingRate::all();
        return response()->view('shipping_rates', [
            'data' => $rate
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'origin'=>'required|string|max:255',
            'destination'=>'required|string|max:255',
            'price'=>'required|numeric',
            'estimation'=>'string|max:255|nullable',
            'noted'=>'string|nullable',
        ]);

        $rate = new ShippingRate();
        $rate->origin = $request->origin;
        $rate->destination = $request->destination;
        $rate->price = $request->price;
        $rate->estimation = $request->estimation;
        $rate->noted = $request->noted;
        $rate->save();

        return response()->redirectToRoute('admin.shipping_rates');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShippingRate  $shippingRate
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingRate $shippingRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShippingRate  $shippingRate
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingRate $shippingRate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShippingRate  $shippingRate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShippingRate $shippingRate)
    {
        $request->validate([
            'origin'=>'string|max:255',
            'destination'=>'string|max:255',
            'price'=>'numeric',
            'estimation'=>'string|max:255|nullable',
            'noted'=>'string|nullable',
        ]);

        $shippingRate->origin = $request->origin;
        $shippingRate->destination = $request->destination;
        $shippingRate->price = $request->price;
        $shippingRate->estimation = $request->estimation;
        $shippingRate->noted = $request->noted;
        $shippingRate->save();

        return response()->redirectToRoute('admin.shipping_rates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShippingRate  $shippingRate
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingRate $shippingRate)
    {
        $shippingRate->delete();
        return response()->redirectToRoute('admin.shipping_rates');
    }
}
