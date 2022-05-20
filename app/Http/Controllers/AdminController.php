<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Member;
use App\Models\Order;
use App\Models\Brand;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function login(){
        return view(('admin.login'));
    }

    public function postRegister(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        $user = new Admin();
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if($res){
            return back()->with('success', 'You have registered successfully!');
        }else{
            return back()->with('fail', 'Something wrong :( !');
        }
    }

    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Admin::where('email', '=', $request->email)->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put([
                    'name' => $user->name,
                    'role' => $user->role
                ]);
                return redirect('/admin');
            }else{
                return back()->with('fails', 'Your password is not correct');
            }
        }else{
            return back()->with('fail', 'This email is not correct');
        }
    }

    public function view($table){
        if($table == 'product'){
            $category = Category::all();
            $products = Product::all();
            return view('admin.view')->with('products', $products)->with('category', $category)->with('table', $table);
        }
        if($table == 'admin'){
            $admins = Admin::all();
            return view('admin.view')->with('admins', $admins)->with('table', $table);
        }
        if($table == 'promotion'){
            $promotions = Promotion::all();
            return view('admin.view')->with('promotions', $promotions)->with('table', $table);
        }
        if($table == 'seller'){
            $sellers = Seller::all();
            return view('admin.view')->with('sellers', $sellers)->with('table', $table);
        }
        if($table == 'feedback'){
            return view('admin.view')->with('feedbacks')->with('table', $table);
        }
        if($table == 'order'){
            $orders = Order::all();
            return view('admin.view')->with('orders' , $orders)->with('table', $table);
        }
        if($table == 'category'){
            $category = Category::all();
            return view('admin.view')->with('categories' , $category)->with('table', $table);
        }
        if($table == 'member'){
            $members = Member::all();
            return view('admin.view')->with('members' , $members)->with('table', $table);
        }
        if($table == 'brand'){
            $brands = Brand::all();
            return view('admin.view')->with('brands' , $brands)->with('table', $table);
        }
    }

    public function create($table){
        if($table == 'product'){
            $category = Category::all();
            $promotions = Promotion::all();
            $brands = Brand::all();
            return view('admin.create')->with('table', $table)->with('category', $category)->with('promotions', $promotions)->with('brands', $brands);
        }
        return view('admin.create')->with('table', $table);
    }

    public function update($table, $id){
        if($table == 'product'){
            $item = Product::find(intval($id));
            $category = Category::all();
            $promotions = Promotion::all();
            $brands = Brand::all();
            return view('admin.update')->with('item', $item)->with('category', $category)->with('promotions', $promotions)->with('table', $table)->with('brands', $brands);
        }

        if($table == 'promotion'){
            $item = Promotion::find(intval($id));
            return view('admin.update')->with('item', $item)->with('table', $table);
        }

        if($table == 'seller'){
            $item = Seller::find(intval($id));
            return view('admin.update')->with('item', $item)->with('table', $table);
        }

        if($table == 'admin'){
            $item = Admin::find(intval($id));
            return view('admin.update')->with('item', $item)->with('table', $table);
        }

        if($table == 'category'){
            $item = Category::find(intval($id));
            return view('admin.update')->with('item', $item)->with('table', $table);
        }

    }

    public function postUpdate(Request $request, $id){
        $request->validate([
            'email' => 'email',
        ]);

        $user = Admin::find(intval($id));

        $user->name = $request->name;
        if($user->email != $request->email){
            $email = Admin::where('email', $request->email)->count();
            if($email >= 1){
                return back()->with('error', 'This email has been taken.');
            }
        }

        $user->email = $request->email;

        if($request->role == ''){
            $user->role = $user->role;
        }else{
            $user->role = $request->role;
        }

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
            return redirect('/admin/view/admin');
        }else{
            return back()->with('fail', 'Something wrong :( !');
        }
    }

    public function delete($id){
        $user= Admin::find(intval($id));
        $user->delete();

        return redirect('/admin/view/admin');
    }

    public function signOut(){
        if(Session::has('name') || Session::has('role')){
            Session::pull('name');
            Session::pull('role');
            return redirect('/admin/login');
        }
    }
}
