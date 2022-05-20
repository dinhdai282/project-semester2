<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table ='brands';
    protected $primaykey = 'id';
    protected $fillable = ['name', 'status', 'description'];
    public $timestamps = false;

    public function product(){
        return $this->hasOne(Product::class);
    }
}
