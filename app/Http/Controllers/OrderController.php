<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function getOrder()
    {
        $orders = $this->orderService->getOrder();
        return view('order.index',[
            'orders'=> $orders
        ]);
    }

    public function getDetailOrder(Order $order)
    {
     $detailItem = $this->orderService->getDetailOrder($order->id);   
     return view('order.detail',[
        'detailItems'=> $detailItem
     ]);
    }

    public function payment(Order $order)
    {
        $user = Auth::user()->id;
        $orders = $orders = Order::where('user_id',$user)->where('id',$order->id)->get();
        $snapToken = $this->orderService->payment($order);
        return view('payment',compact('snapToken','orders'));

    }


}
