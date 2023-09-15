<?php 
namespace App\Services\Implementation;

use App\Models\Product;
use App\Services\ProductService;

class ProductServiceImpl implements ProductService
{
    public function getAllProducts()
    {
        return Product::latest();
    }

    public function getProductDetail($id)
    {
        return Product::find($id);
    }
}
?>