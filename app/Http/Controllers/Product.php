<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Product extends Controller
{
    public function AddSaleForProduct(Request $request)
    {
        $req=$request->input('product');
        $pro=new \App\Models\Product();
        $dis=$pro->price*0.1;
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $product=\App\Models\Product::query()->where('id',$req)->where('created_at','<',$startOfWeek)->where('created_at','>',$endOfWeek)->update(['price'=>$dis]);
        return response()->json(['message'=>'Ok','Data'=>$product],201);
    }
}
