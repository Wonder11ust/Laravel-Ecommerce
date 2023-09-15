<?php 
namespace App\Services\Implementation;

use App\Models\Cart;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;

class CartServiceImpl implements CartService
{

   
    public function addToCart($productId, $quantity)
    {
        $product = Product::find($productId);
        $buyer = Auth::user()->id;
        if (!$product) {
            throw new \Exception('product not found');
        }

        $cartItems = Cart::where('user_id',$buyer)->where('product_id',$productId)->first();
        
        
        if($cartItems)
        {
            if($product->stocks < $cartItems->quantity){
                return back()->with('error','Quantity cannot more than stocks');
            }
            $existingQuantity = $cartItems->quantity;
            $cartItems->quantity = $existingQuantity + $quantity;
            $cartItems->totalPrice = $product->product_price * ($existingQuantity+$quantity);
            $cartItems->save();
        }else{
            $cartItems = new Cart();
            $cartItems->product_id = $productId;
            $cartItems->user_id = $buyer;
            $cartItems->quantity = $quantity;
            $cartItems->totalPrice = $product->product_price * $quantity;
            $cartItems->save();
        }

       
    }

    public function removeFromCart($cartId)
    {
        $cartItems = Cart::where('id',$cartId);
        $cartItems->delete();
    }

    public function updateQuantity($cartId, $quantity)
    {
       $cartItems = Cart::find($cartId);
       if ($quantity > $cartItems->product->stocks) {
        return back()->with('error','Quantity cannot more than stocks');
       }
       if (!$cartItems) {
        throw new \Exception('Product not found');
       }
      
       $cartItems->quantity = $quantity;
       $cartItems->totalPrice = $cartItems->quantity * $cartItems->product->product_price;
       $cartItems->save();
    }

    public function getCartItems()
    {
        $buyer = Auth::user()->id;
        $cartItems = Cart::where('user_id',$buyer)->get();
        return $cartItems;
    }

    public function getTotalPrice()
    {
        $totalPrice = 0;
        $cartItems = $this->getCartItems();
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            $quantity = $cartItem->quantity;
            $totalPrice += $product->product_price * $quantity;
        }
        return $totalPrice;

    }

    public function clearCart()
    {
        $buyer = Auth::user()->id;
        Cart::where('user_id',$buyer)->delete();
    }
}
?>