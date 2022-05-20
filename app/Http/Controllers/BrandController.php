<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required|unique:categories',
            'status' => 'required'
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->status;

        $res = $brand->save();

        if($res){
            return back()->with('success', 'You have created successfully!');
        }else{
            return back()->with('fail', 'Something wrong :( !');
        }
    }

    public function update(Request $request, $id){
        $item = Brand::find(intval($id));

        if($request->status == ''){
            $item->status = $item->status;
        }else{
            $item->status = $request->status;
        }

        if($request->name == ''){
            $item->name = $item->name;
        }

        if($request->description == ''){
            $item->description = $item->description;
        }

        $item->name = $request->name;
        $item->description = $request->description;
        $item->status= $request->status;
        
        $res = $item->save();

        if($res){
            return redirect('/admin/view/brand');
        }else{
            return back()->with('fail', 'Something wrong :( !');
        }
    }
}
