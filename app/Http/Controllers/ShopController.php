<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class ShopController extends Controller
{

    public function index()
    {
    	$product = Product::all()->toArray();
    	return view('shop/products', compact('product'));
	}



	public function show($id)
    {
        $products =  Product::with('comment')->find($id);
	    return view('shop.show')->with('product', $products);
	}
}

