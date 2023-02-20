<?php

namespace App\Http\Controllers;

use App\Models\Custom;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function update(Request $request)
    {
        Custom::whereId(1)->update(['code' => $request->code, 'markup_price' => $request->markup_price]);
        return back()->withSuccess('Data Updated Succesfully');
    }
}
