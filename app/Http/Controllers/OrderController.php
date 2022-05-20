<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    public function orderDetail($id){
        $orderdetail = OrderDetail::where('order_id', $id)->get();
        
    }
}
