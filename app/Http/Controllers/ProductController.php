<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view('products.index', [
            'products' => $products
        ]);
    }

    public function show(Product $product){
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|integer',
            'image' => 'required|mimes:jpeg,jpg|max:2000'
        ]);
        $product = new Product;
        $path = $request->image->store('public');
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $path;
        $product->save();
        return redirect()->route('products.index')->with('message','New product created!');
    }

    public function edit(Product $product){
        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(Product $product, Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|integer',
            'image' => 'mimes:jpeg,jpg|max:2000'
        ]);
        if($request->image){
            Storage::delete($product->image);
            $path = $request->image->store('public');
            $product->image = $path;
        }
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return redirect()->route('products.index')->with('message','Product updated!');
    }

    public function delete(Product $product){
        Storage::delete($product->image);
        $product->delete();
        return redirect()->route('products.index')->with('message','Product deleted!');
    }
}
