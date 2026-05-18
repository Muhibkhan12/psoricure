<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(Request $request)
{
    try {

        $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:100',
            'price' => 'required|numeric',
            'description' => 'required|string|max:500',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:available,out of stock',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        // upload image
        $imagePath = $request->file('image')->store('products', 'public');

        Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $request->slug,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->status,
            'image' => $imagePath,
        ]);

        return back()->with('success', 'Product added successfully');

    } catch (\Exception $e) {
        return back()->with('error', $e->getMessage());
    }
}

public function showProuctsAll(){
    $products = Products::all();

    return view('admin.ManageProducts',compact('products'));
}

    public function updateProduct(Request $request, $id){
        try{
            $Product = Products::findOrfail($id);
            $validated = $request->validate([
                'name'=>'string|required|max:100',
                'slug'=>'string|max:100|nullable',
                'price'=>'numeric|required',
                'description'=>'string|max:500|required',
                'image'=>'string|required|max:200',
                'stock'=>'integer|required|min:0',
                'status'=>'required|string',
            ]);
            $Product->update($validated);
            return redirect()->route('admin.addPorducts')->with('Success','Product Updated Successfully'); 

        }catch(\Exception $e){
            return redirect()->back()->with('error','Something Went Wrong');
        }
    }
    public function deleteProduct($id){
        try{
            $product = Products::findOrFail($id);
            $product->delete();

            return redirect()->route('admin.addProducts')->with('success','Product deleted successfully');
        }catch(\Throwable $e){
            return redirect()->back()->with('error','Something Went wrong');
        }   
    }
}
