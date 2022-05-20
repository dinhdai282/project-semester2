<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class MemberController extends Controller
{
    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Member::where('email', '=', $request->email)->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put([
                    'userID' => $user->id,
                ]);
                return redirect()->route('home');
            }else{
                return back()->with('fails', 'Your password is not correct');
            }
        }else{
            return back()->with('fail', 'This email is not correct');
        }
    }

    public function postRegister(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
            'phone' => 'required|min:9|max:11'
        ]);

        $user = new Member();
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->password == $request->confirm_password){
            $user->password = Hash::make($request->password);
            $res = $user->save();

            if($res){
                return back()->with('success', 'You have registered successfully!');
            }else{
                return back()->with('fail', 'Something wrong :( !');
            }
        } else{
            return back()->with('password_error', 'Your confirm password is not the same as your password!');
        }
    }

    public function postUpdate(Request $request, $id){
        $request->validate([
            'email' => 'email',
            'phone' => 'min:9|max:11'
        ]);

        $user = Member::find(intval($id));

        $user->name = $request->name;
        $user->phone = $request->phone;

        if($user->email != $request->email){
            $email = Member::where('email', $request->email)->count();
            if($email >= 1){
                return back()->with('error', 'This email has been taken.');
            }
        }
        $user->email = $request->email;

        if($request->password == ''){
            $user->password = $user->password;
        }else{
            $string = strval($request->password);
            if(strlen($string) < 6){
                return back()->with('passworderror', 'Password length must be greater or equal to 6.');
            }
            $user->password = Hash::make($request->password);
        }


        $res = $user->save();

        if($res){
            return redirect('/');
        }else{
            return back()->with('fail', 'Something wrong :( !');
        }
    }

    public function signOut(){
        if(Session::has('userID')){
            Session::pull('userID');
            return redirect('/');
        }
    }

    public function viewHistoryCart($id){
        $orders = Order::where('member_id', $id)->get();
        return view('guest.historycart')->with('orders', $orders);
    }

    public function delete($id){
        $item = Member::find(intval($id));
        $item->delete();

        return redirect('/admin/view/member');
    }
}
