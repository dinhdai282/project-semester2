<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required|unique:categories',
            'image' => 'file|required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $image=$request->file('image');
        $fileName = $image->getClientOriginalName();
        $image->move('images/category',$fileName);    

        $category->image = $fileName;
        $res = $category->save();

        if($res){
            return back()->with('success', 'You have created successfully!');
        }else{
            return back()->with('fail', 'Something wrong :( !');
        }
    }

    public function update(Request $request, $id){
        $item = Category::find(intval($id));

        $item->name = $request->name;
        $item->description = $request->description;

        if($request->status == ''){
            $item->status = $item->status;
        }else{
            $item->status = $request->status;
        }
        
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $imageName = $file->getClientOriginalName();
            $file->move("images/category", $imageName);
            $item->image = $imageName;
        } else { 
            $item->image = $item->image;
        }

        $res = $item->save();

        if($res){
            return redirect('/admin/view/category');
        }else{
            return back()->with('fail', 'Something wrong :( !');
        }
    }


}
