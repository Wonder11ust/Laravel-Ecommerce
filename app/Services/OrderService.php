<?php 
namespace App\Services;

use App\Models\Order;
use Illuminate\Http\Client\Request;

interface OrderService{
    public function getOrder();
    public function getDetailOrder($orderId);
    public function payment(Order $order);
}
?>