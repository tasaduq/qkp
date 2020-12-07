<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $cacheFor = 10000;

    public function totalCount($query)
    {
        // $query->
        // return number_format( $this->price );
        return 0;
    }

}
