<?php 
namespace App\Services;
use Illuminate\Http\Request;


interface CheckoutService{
    public function getCheckoutItems();
    public function getTotalPriceItems();
    public function order(Request $request);
}
?>