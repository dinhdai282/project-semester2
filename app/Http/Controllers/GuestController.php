<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Order;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function index(){
        $promotions = Promotion::all();
        $products = Product::all();
        $categories = Category::all();
        return view('guest.index')->with('promotions', $promotions)->with('products', $products)->with('categories', $categories);
    }

    public function contact(){
        return view('guest.contact');
    }

    public function feedback(){
        return view('guest.feedback');
    }

    public function login(){
        return view('guest.login');
    }

    public function register(){
        return view('guest.register');
    }

    public function update($id){
        $user = Member::find(intval($id));
        $password = Hash::info($user->password);
        return view('guest.update')->with('user', $user)->with('pass', $password);
    }

    public function category($id){
        $products = Product::where('cateid', $id)->get();
        $brands = Brand::all();
        return view('guest.product')->with('products', $products)->with('brands', $brands);
    }

    public function brandFilter($id){
        $products = Product::where('brand_id', intval($id))->get();
        return view('guest.product')->with('products',$products);
    }

    public function productDetail($id){
        $product = Product::find(intval($id));
        return view('guest.productdetail')->with('product', $product);
    }
}
