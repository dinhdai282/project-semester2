<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table ='promotions';
    protected $primaykey = 'id';
    protected $fillable = ['name', 'description', 'image', 'discount'];
    public $timestamps = false;
}
