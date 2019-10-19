<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = $this->product->paginate(10);

        return view('site.index', compact('products'));
    }

    public function single($slug)
    {
       $product = $this->product->whereSlug($slug)->first();

       return view('site.single', compact('product'));
    }
}
