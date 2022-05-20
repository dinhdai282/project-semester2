<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required',
            'image' => 'file|required',
            'category' => 'required',
            'brand' => 'required'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->cateid = $request->category;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->brand_id = $request->brand;
        $product->status = $request->status;
        $product->promotion_id = $request->promotion;

        $path = "images/product/".$product->category->name;
        
        $image=$request->file('image');
        $fileName = $image->getClientOriginalName();
        $image->move($path ,$fileName);    

        $product->image = $fileName;

        $res = $product->save();

        if($res){
            return back()->with('success', 'You have created successfully!');
        }else{
            return back()->with('fail', 'Something wrong :( !');
        }

        
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required'
        ]);

        $item = Product::find(intval($id));
        
        if($item->name != $request->name){
            $name = Product::where('name', $request->name)->count();
            if($name >= 1){
                return back()->with('producterror', 'This name has been taken.');
            }
        }

        $item->name = $request->name;
        
        if($request->cateid == ''){
            $item->cateid = $item->cateid;
        }else{
            $item->cateid = $request->cateid;
        }

        if($request->description == ''){
            $item->description = $item->description;
        }else{
            $item->description = $request->description;
        }

        if($request->price == ''){
            $item->price = $item->price;
        }else{
            $item->price = $request->price;
        }

        if($request->status == ''){
            $item->status = $item->status;
        }else{
            $item->status = $request->status;
        }

        if($request->promotion == ''){
            $item->promotion_id = $item->promotion_id;
        }else{
            $item->promotion_id = $request->promotion;
        }
        
        $path = "images/product/".$item->category->name;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $imageName = $file->getClientOriginalName();
            $file->move($path, $imageName);
            $item->image = $imageName;
        } else { 
            $item->image = $item->image;
        }

        $res = $item->save();

        if($res){
            return redirect('/admin/view/product');
        }else{
            return back()->with('fail', 'Something wrong :( !');
        }
    }

}
