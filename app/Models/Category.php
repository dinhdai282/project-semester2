<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table ='categories';
    protected $primaykey = 'id';
    protected $fillable = ['name', 'description'];
    public $timestamps = false;

    public function product(){
        return $this->hasOne(Product::class);
    }
}
