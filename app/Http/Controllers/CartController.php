<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $products = session()->has('products') ? session()->get('products') : [];

        return view('site.cart', compact('products'));
    }

    public function add(Request $request)
    {
        $product = $request->get('product');

        if(session()->has('products')) {
            session()->push('products', $product);

        } else {
            $products[] = $product;

            session()->put('products', $products);
        }

        flash('Produto Adicionado no Carrinho')->success();
        return redirect()->route('single', ['slug' => $product['slug']]);
    }

    public function remove($slug)
    {
        if(!session()->has('products')) {
            return redirect()->route('cart.index');
        }

        $products = session()->get('products');

        $products = array_filter($products, function($line) use($slug){
            return $line['slug'] != $slug;
        });

        session()->put('products', $products);

        flash('Produto removido do carrinho...')->success();
        return redirect()->route('cart.index');
    }

    public function cancel()
    {
        session()->forget('products');

        flash('Carrinho removido...')->success();
        return redirect()->route('cart.index');
    }
}
