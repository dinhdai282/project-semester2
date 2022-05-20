<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table ='products';
    protected $primaykey = 'id';
    protected $fillable = ['cateid', 'name', 'description', 'price', 'image', 'promotion_id'];
    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Category::class, 'cateid');
    }

    public function promotion(){
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
