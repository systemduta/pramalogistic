<?php

namespace App\Http\Controllers;

use App\ShippingRate;
use Illuminate\Http\Request;

class ShippingRateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'search']);
    }

    public function search(Request $request)
    {
        $request->validate([
            'search'=>'required|string|max:20',
            'type'=>'required|string|max:20',
        ]);

        $search = ShippingRate::query()
            ->when($request->type == 'origin', function ($q) use ($request) {
                return $q->where('origin', 'like', '%'.$request->search.'%');
            })
            ->when($request->type == 'destination', function ($q) use ($request) {
                return $q->where('destination', 'like', '%'.$request->search.'%');
            })->get();

        if ($request->type=='origin' && $search) {
            $search = $search->map(function ($item, $key){
                return [
                    'id' => $item->id,
                    'text' => $item->origin
                ];
            })->unique('text');
        }

        if ($request->type=='destination' && $search) {
            $search = $search->map(function ($item, $key){
                return [
                    'id' => $item->id,
                    'text' => $item->destination
                ];
            })->unique('text');
        }

        return response()->json($search);
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
    public function index(Request $request)
    {
        $request->validate([
            'origin'=>'string|max:20',
            'destination'=>'string|max:20',
        ]);
        $rate = ShippingRate::query()
            ->when($request->has('origin'), function ($q) use ($request){
                return $q->where('origin', 'like', '%'.$request->origin.'%');
            })
            ->when($request->has('destination'), function ($q) use ($request){
                return $q->where('destination', 'like', '%'.$request->destination.'%');
            })
            ->get();
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
            'price'=>'required|string|max:255',
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
            'price'=>'string|max:255',
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
