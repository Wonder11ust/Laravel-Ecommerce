<?php 
namespace App\Services\Implementation;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\OrderService;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class OrderServiceImpl implements OrderService
{

    public function getOrder()
    {
        $userId = Auth::user()->id;
        $order = Order::where('user_id',$userId)->get();
        return $order;
    }

    public function getDetailOrder($orderId)
    {
        $detailItem = OrderItem::where('order_id',$orderId)->get();
        return $detailItem;
    }

    public function payment(Order $order)
    {
        $user = Auth::user()->id;
        $orders = Order::where('user_id',$user)->where('id',$order->id)->get();
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

        $itemDetails = [];
        $items = OrderItem::where('order_id',$order->id)->get();
        foreach($items as $item)
        {
            $itemDetails[] = [
                'id'=> $item->product->id,
                'name'=> $item->product->product_name,
                'quantity'=> $item->quantity,
                'price'=>$item->price
            ];
        }
        $params =  [
            'transaction_details' => [
              'order_id' =>  $order->id,
              'gross_amount'=> $order->totalPrice,
            ],
            'customer_details' => [
                'first_name' => $order->user->name,
                'email'=> $order->user->email,
            ],
            'item_details'=> $itemDetails
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return $snapToken;
    }
}
?>