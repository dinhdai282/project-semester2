<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use App\Cart;

class CartController extends Controller
{
    public function addCart($id){
        $product = Product::find(intval($id));
        if($product != null){
            $oldcart = Session('cart') ? Session('cart') : null;
            $newCart = new Cart($oldcart);
            $newCart->AddCart($product, $id);
        }
    }
}
