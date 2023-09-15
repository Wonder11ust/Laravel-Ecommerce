<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();
        return view('admin.index',[
            'totalProducts'=>$totalProducts,
            'totalOrders'=>$totalOrders,
            'totalUsers'=>$totalUsers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.create',[
        'products'=> Product::latest()->paginate(10),
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedProduct = $request->validate([
            'product_name'=> 'required',
            'product_price'=>'required|integer',
            'product_image'=>'required|file|image|max:1024',
            'stocks'=> 'required|integer',
            'description'=>'required'

        ]);

        $validatedProduct['product_image'] = $request->file('product_image')->store('product_image');

        Product::create($validatedProduct);
        return back()->with('success','Product added successfully');
    }

 
  

    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('admin.edit',[
            'product'=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //$product = Product::find($id);

        $rules = [
            'product_name'=>'required',
            'product_price'=>'required',
            'product_image'=>'file|image|max:1024',
            'stocks'=>'required',
            'description'=>'required',
        ];
        $validatedProduct = $request->validate($rules);

        if($request->file('product_image')){
           if($request->old_image){
            Storage::delete($request->old_image);
           }
           $validatedProduct['product_image'] = $request->file('product_image')->store('product_image');
        }

        Product::where('id',$id)->update($validatedProduct);
        return redirect('/admin/dashboard/create')->with('success_edit','Product updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $product = Product::find($id);
       if ($product->product_image) {
        Storage::delete($product->product_image);
       }
       $product->delete();

       return back()->with('success_delete','Product deleted');
    }
}
