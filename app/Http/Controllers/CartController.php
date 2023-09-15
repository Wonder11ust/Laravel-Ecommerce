<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart(Request $request)
    {
        $productId = $request->productId;
        $quantity = $request->quantity;
        
        $this->cartService->addToCart($productId,$quantity);
        //session(['cart'=>$this->cartService->getCartItems()]);
        return redirect('/products');
    }

    public function getCart()
    {
      
        return view('products.cart',[
            'carts'=>$this->cartService->getCartItems(),
            'totalPrice'=>$this->cartService->getTotalPrice()
        ]);
        
    }

    public function removeFromCart(Cart $cart)
    {
        $this->cartService->removeFromCart($cart->id);
        return redirect('/cart');
    }

    public function updateQuantity(Cart $cart,Request $request)
    {
        $quantity = $request->quantity;
        if (!is_null($quantity)) {
            $this->cartService->updateQuantity($cart->id,$quantity);
        
            return redirect('/cart');
        }
    }

    public function clearCart()
    {
        $this->cartService->clearCart();
        return redirect('/cart');
    }
}
