<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $cacheFor = 10000;

    public function totalCount()
    {
        return \App\Models\Products::where([
            "category" => $this->category_id,
            "active" => 1,
            // "sold" => 0,
        ])->count();
        
    }

}
