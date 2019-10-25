<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPSC\PagSeguro\Credentials;
use PHPSC\PagSeguro\Environments\Production;
use PHPSC\PagSeguro\Environments\Sandbox;
use PHPSC\PagSeguro\Customer\Customer;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class CheckoutController extends Controller
{
    public function checkout()
    {
    	if(!auth()->check()) {
			return redirect()->route('login', ['checkout' => true]);
	    }

	    $products = session()->get('products');

    	return view('site.checkout.index', compact('products'));
    }

    public function confirm()
    {
    	if(!auth()->check()) {
		    return redirect()->route('login', ['checkout' => true]);
	    }

	    $enviroment = env('PAGSEGURO_SANDBOX') ? new Sandbox() : new Production();

	    $credentials = new Credentials(
	    	env('PAGSEGURO_EMAIL'),
		    env('PAGSEGURO_TOKEN'),
		    $enviroment
	    );

	    try {
		    $products = session()->get('products');
		    $user = auth()->user();

		    $service = new CheckoutService($credentials);
		    $checkout = $service->createCheckoutBuilder();

		    $order = $user->orders()->create([
		    	'items' => serialize($products),
		    ]);

		    foreach($products as $product) {
		    	$checkout->addItem(new Item($order->id, $product['name'], $product['price'], $product['qtd']));
		    }

		    $checkout = $checkout->getCheckout();

		    $response = $service->checkout($checkout);

		    session()->forget('products');

		    return redirect($response->getRedirectionUrl());

	    } catch (\Exception $error) {
		    flash($error->getMessage())->warning();
		    return redirect()->back();
	    }
    }
}
