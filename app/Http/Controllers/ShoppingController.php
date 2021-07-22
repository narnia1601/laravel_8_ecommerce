<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentsMail;

class ShoppingController extends Controller
{
    public function store(Request $request){
        $product = Product::find($request->product_id);
        $cart = Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'qty' => $request->quantity,
            'price' => $product->price,
            'options' => ['image' => $product->image],
        ]);
        return redirect()->route('dashboard')->with('message','Product added to cart!');
    }

    public function index(){
        return view('cart');
    }

    public function destroy($rowId){
        Cart::remove($rowId);
        return back()->with('message','Product removed from cart!');
    }

    public function update($rowId, Request $request){
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);
        Cart::update($rowId, $request->quantity);
        return back()->with('message','Product quantity updated!');
    }

    public function checkout(){
        return view('checkout');
    }

    public function payment(Request $request){
        $price = Cart::total() * 100;
        auth()->user()->charge($price, $request->paymentMethod);
        Cart::destroy();
        Mail::to(auth()->user())->send(new PaymentsMail());
        return redirect('/dashboard');
    }
}
