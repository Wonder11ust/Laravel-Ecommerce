<?php

namespace App\Http\Controllers;

use App\Services\CheckoutService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $checkoutService;

    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
       
    }

    public function checkout()
    {
        return view('checkout.index',[
            'items'=>  $this->checkoutService->getCheckoutItems(),
            'totalPrice'=>$this->checkoutService->getTotalPriceItems(),
        ]);
    }

    public function order(Request $request)
    {
        $this->checkoutService->order($request);
        return redirect('/orders');
    }
}
