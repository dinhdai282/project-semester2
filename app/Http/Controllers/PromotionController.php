<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required|unique:promotions',
            'image' => 'file|required'
        ]);

        $promotion = new Promotion();
        $promotion->name = $request->name;
        $promotion->description = $request->description;
        $promotion->discount = floatval($request->discount);
        
        $image=$request->file('image');
        $fileName = $image->getClientOriginalName();
        $image->move('images/promotion',$fileName);    

        $promotion->image = $fileName;

        $res = $promotion->save();

        if($res){
            return back()->with('success', 'You have created successfully!');
        }else{
            return back()->with('fail', 'Something wrong :( !');
        }       
    }

    public function update(Request $request, $id){
        $item = Promotion::find(intval($id));

        $item->name = $request->name;
        $item->description = $request->description;
        $item->discount = floatval($request->discount);

        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $imageName = $file->getClientOriginalName();
            $file->move("images/promotion", $imageName);
            $item->image = $imageName;
        } else { 
            $item->image = $item->image;
        }

        $res = $item->save();

        if($res){
            return redirect('/admin/view/promotion');
        }else{
            return back()->with('fail', 'Something wrong :( !');
        }
    }

    public function delete($id){
        $item = Promotion::find(intval($id));
        $item->delete();

        return redirect('/admin/view/promotion');
    }
}
