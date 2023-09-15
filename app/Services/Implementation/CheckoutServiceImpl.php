<?php 
namespace App\Services\Implementation;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\CheckoutService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CheckoutServiceImpl implements CheckoutService
{
    private $cartService;
    private $response = [];
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
       
    }
    public function getCheckoutItems()
    {
       return $this->cartService->getCartItems();
        
    }

    public function getTotalPriceItems()
    {
        return $this->cartService->getTotalPrice();
    }

    public function order(Request $request)
    {
        
        $userId = Auth::user()->id;
        $totalPrice = $this->getTotalPriceItems();
        $shipping = $request->shipping_address;
        $date = date('Y-m-d');
        $payment = $request->payment_method;

        Order::create([
            'id' => rand(100,999),
            'user_id' =>$userId,
            'totalPrice'=>$totalPrice,
            'order_date'=>$date,
            'payment_method'=>$payment,
            'shipping_address'=>$shipping,
            'status'=> 'Pending',
            'snap_token'=>'xxxxxx'
        ]);

        $carts = $this->getCheckoutItems();
        $order = Order::where('user_id',$userId)->latest()->first();

        foreach($carts as $cart)
        {
            OrderItem::create([
                
               'order_id' => $order->id,
               'product_id'=> $cart->product->id,
               'quantity'=> $cart->quantity,
               'price'=> $cart->product->product_price 
            ]);

            $product = Product::find($cart->product->id);
            $updatedStock = $product->stocks - $cart->quantity;
            $product->update(['stocks'=>$updatedStock]);
        }

        // DB::transaction(function() use($request){
           
        //     $orders = Order::create([
        //         'id' => 'Order-'.uniqid(),
        //         'user_id'=>Auth::user()->id,
        //         'totalPrice'=>$this->getTotalPriceItems(),
        //         'order_date'=>date('Y-m-d'),
        //         'payment_method'=>$request->payment_method,
        //         'shipping_adrress'=>$request->shipping_address,
        //         'status'=>'Pending',
        //     ]);
        //     $carts = $this->getCheckoutItems();
        //     $order = Order::where('user_id',Auth::user()->id)->latest()->first();
        //     $itemDetails = [];
        //     foreach($carts as $cart)
        // {
        //     OrderItem::create([
                
        //        'order_id' => $order->id,
        //        'product_id'=> $cart->product->id,
        //        'quantity'=> $cart->quantity,
        //        'price'=> $cart->product->product_price 
        //     ]);

        //     $product = Product::find($cart->product->id);
        //     $updatedStock = $product->stocks - $cart->quantity;
        //     $product->update(['stocks'=>$updatedStock]);

        //     $itemDetails[] = [
        //         'id'=>$cart->product->id,
        //         'price'=>$cart->product->price,
        //         'quantity'=>$cart->quantity,
        //         'name'=>$cart->product->name
        //     ];
        // }
        //     $payload = [
        //         'transaction_details'=> [
        //             'order_id'=>$orders->id,
        //             'gross_amount'=> $orders->totalPrice,
        //         ],
        //         'customer_details'=>[
        //             'first_name'=> $orders->user->name,
        //             'email'=> $orders->user->email,
        //         ],
        //         'item_details'=>$itemDetails
        //     ];
        //     $snapToken = \Midtrans\Snap::getSnapToken($payload);

        //         $orders->snap_token = $snapToken;
        //         $orders->save();

        //         $this->response['snap_token'] = $snapToken; 
        // });
        // $this->cartService->clearCart();
        // response()->json($this->response) ;


    }
}
?>