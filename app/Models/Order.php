<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primarykey = 'id';
    protected $fillable =['member_id'];

    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function orderdetail(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
