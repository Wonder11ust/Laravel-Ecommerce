<?php 
namespace App\Services;

interface CartService 
{
    public function addToCart($productId,$quantity);
    public function removeFromCart($productId);
    public function updateQuantity($productId,$quantity);
    public function getCartItems();
    public function getTotalPrice();
    public function clearCart();
}
?>