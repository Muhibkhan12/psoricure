<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(Request $request){
        try{
            $validated = $request->validate([
            'name'=>'string|required|max:100',
            'slug'=>'string|max:100|nullable',
            'price'=>'numeric|required',
            'description'=>'string|max:500|required',
            'image'=>'string|required|max:200',
            'stock'=>'integer|required|min:0',
            'status'=>'required|string',
        ]);
        $product = Product::create($validated);

        return redirect()->route('admin.addProducts')->with('success','Product add successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function updateProduct(Request $request, $id){
        try{
            $Product = Product::findOrfail($id);
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
            $product = Product::findOrFail($id);
            $product->delete();

            return redirect()->route('admin.addProducts')->with('success','Product deleted successfully');
        }catch(\Throwable $e){
            return redirect()->back()->with('error','Something Went wrong');
        }   
    }
}
