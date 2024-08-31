<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Product extends Controller
{
    public function AddSaleForProduct(Request $request,$id)
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $pro=\App\Models\Product::find($id);
        if ($pro)
        {
            if (\App\Models\Product::where('id',$id)->whereBetween('created_at',[$startOfWeek,$endOfWeek]))
            {
                ($pro->price-=40)/100;
                $pro->save();
            }
        }
    }
}
