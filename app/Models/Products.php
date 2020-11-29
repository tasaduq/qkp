<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['name', 'color','category','weight','price','description','active'];
    protected $primaryKey = 'product_id';
}
