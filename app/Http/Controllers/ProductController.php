<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
private $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('products.index',[
            'products'=> $products->paginate(5)
        ]);
    }

    public function detail(Product $product)
    {
        $product = $this->productService->getProductDetail($product->id);
        return view('products.detail',[
            'product'=>$product
        ]);
    }
}
