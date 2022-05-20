<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    protected $primarykey = 'id';
    protected $fillable =['orderr_id', 'product_id', 'quantity', 'price'];

    public $timestamps = false;

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
