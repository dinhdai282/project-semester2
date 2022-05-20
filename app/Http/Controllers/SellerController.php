<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;

class SellerController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:9',
            'civilid' => 'required|min:9',
            'store' => 'required',
            'address' => 'required'
        ]);

        $seller = new Seller();
        
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->phone = $request->phone;
        $seller->civilid = $request->civilid;
        $seller->store = $request->store;
        $seller->address = $request->address;

        $res = $seller->save();

        if($res){
            return back()->with('success', 'You have registered successfully!');
        }else{
            return back()->with('fail', 'Something wrong :( !');
        }
    }

    public function update(Request $request, $id){
        $item = Seller::find(intval($id));

        $item->name = $request->name;
        $item->email = $request->email;
        $item->phone = $request->phone;
        $item->civilid = $request->civilid;

        if($request->store == ''){
            $item->store = $item->store;
        }else{
            $item->store = $request->store;
        }

        if($request->address == ''){
            $item->address = $item->address;
        }else{
            $item->address = $request->address;
        }

        $res = $item->save();

        if($res){
            return redirect('/admin/view/seller');
        }else{
            return back()->with('fail', 'Something wrong :( !');
        }
    }

    public function delete($id){
        $item = Seller::find(intval($id));
        $item->delete();

        return redirect('/admin/view/seller');
    }
}
