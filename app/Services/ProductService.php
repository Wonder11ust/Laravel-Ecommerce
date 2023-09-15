<?php 
namespace App\Services;

interface ProductService
{
    public function getAllProducts();
    public function getProductDetail($id);
} 
?>