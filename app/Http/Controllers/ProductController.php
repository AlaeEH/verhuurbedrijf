<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;     
use App\Http\Requests;
use App\Product;
use App\Cart;
use App\Order;  
use Auth;
use Session;
use Illuminate\Notifications\Notifiable;

class ProductController extends Controller
{
	public function search(Request $request)
	{
		$products = Product::all();

		if($products){
			return view('content.search')->with('products', $products);  
		}
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/

	public function create()
	{
		return view('products.create');
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
			'title'=>'required',
			'description'=>'required',
			'in_stock'=>'required|integer',
			'price'=>'required|integer',
			'status'=>''
		]);

		$products = new Product();
		$products->title = $request->title;
		$products->description = $request->description;
		$products->product_image = $request->product_image;
		$products->in_stock = $request->in_stock;
		$products->price = $request->price;
		$products->status = ($request->status) ? 1 : 0;
		$products->save();
	}

	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/

	public function show($id)
	{

	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/

	public function edit($id)
	{
		$product = Product::find($id);
		return view('products.edit', compact('product'));
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
		$request->validate([
			'title'=>'required',
			'description'=> 'required',
			'price' => 'required|integer'
		]);

		$product = Product::find($id);
		$product->title = $request->get('title');
		$product->description = $request->get('description');
		$product->in_stock = $request->get('in_stock');
		$product->price = $request->get('price');
		$product->status = $request->get('status') ? 1 : 0;
		$product->save();

		return redirect('/search')->with('success', 'Stock has been updated');
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	
	public function destroy($id)
	{
		$product = Product::find($id);
		$product->delete();

		return redirect('/search')->with('success', 'Stock has been deleted Successfully');
	}

	public function index()
	{
		$products = Product::latest()->paginate(5);
		return view('products.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
	}

	// CARTTTT

	public function addToCart(Request $request, $id) 
	{
		$product = Product::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->add($product, $product->id);
		$request->session()->put('cart', $cart);

		return redirect()->route('shop.products')->with('success', 'The product has succesfully been added to the cart.');

	}

	public function getCart()
	{
		if(!Session::has('cart')){return view('cart/shoppingcart');}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		return view('cart/shoppingcart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	}

	public function getReduceByOne($id) {
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->reduceByOne($id);
		if (count($cart->items) > 0) {
			Session::put('cart', $cart);
		} 
		else {
			Session::forget('cart');
		}
		return redirect()->route('shoppingcart')->with('success', 'Product is succesfully reduces by one.');
	}


	public function getRemoveItem($id) {
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->removeItem($id);
		if (count($cart->items) > 0) {
			Session::put('cart', $cart);
		} 
		else {
			Session::forget('cart');
		}
		return redirect('/cart/shoppingcart')->with('success', 'Product is succesfully removed from the cart.');
	}

	public function getCheckout()
	{
		if (!Session::has('cart')) {
			return view('cart/shoppingcart');
		}
		$user = auth()->user();
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		$total = $cart->totalPrice;
		return view('cart/checkout', ['total' => $total])->with('user', $user);
	}

	public function postCheckout(Request $request)
	{
		$products = Product::get();

		if (!Session::has('cart')) {
			return redirect()->route('user.shoppingCart');
		}

		$request->validate([
			'first_name' => 'required|regex:/^[\pL\s\-]+$/u',
			'last_name' => 'required|regex:/^[\pL\s\-]+$/u',

		]);

		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		$order = new Order();
		$order->user_id = $request->get('user_id');
		$order->first_name = $request->get('first_name');
		$order->last_name = $request->get('last_name');
		$order->terminal = $request->get('terminal');
		$order->cart = serialize($cart);
		$order->name = $request->get('name');
		$order->start = $request->get('start');
		$order->end = $request->get('end');
		$order->price = $request->get('price');

		// if($validator->fails())
		// {
		// 	return Redirect::back()->withErrors($validator);
		// }

		// voorraad systeem
		if(Auth::user()->order()->save($order)){
			$notInStock = [];

			$cart = Session::get('cart');

			foreach($cart->items as $item) { 
				$product = Product::find($item['item']->id);

				if($product->in_stock - $item['item']->in_stock < 0) {
				array_push($notInStock, $item['item']->id);
				}
				$product->in_stock = $product->in_stock - $item['item']->in_stock;
				$product->save();
			}

			if(count($notInStock)) {
				return redirect()->route('shop.products')->with('fail', 'not enough in stock')->with('notInStock', $notInStock);
			}

			Session::forget('cart');

			return redirect()->route('shop.products')->with('success', 'Successfully purchased products!');
		}

	}
















}