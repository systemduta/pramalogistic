<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name'=>'string|max:255|nullable',
            'email'=>'string|max:255|nullable',
            'password'=>'string|max:255|nullable',
            'company_name'=>'string|max:255|nullable',
            'company_wa'=>'string|max:20|nullable',
            'company_address'=>'string|nullable',
        ]);

        $user = User::query()->findOrFail($id);
        if ($request->name) $user->name = $request->name;
        if ($request->email) $user->email = $request->email;
        if ($request->password) $user->password = $request->password;
        if ($request->company_name) $user->company_name = $request->company_name;
        if ($request->company_wa) $user->company_wa = $request->company_wa;
        if ($request->company_address) $user->company_address = $request->company_address;
        $user->save();

        return response()->redirectToRoute('admin.shipping_rates');
    }
}
