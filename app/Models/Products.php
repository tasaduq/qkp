<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Products extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['name', 'color','category','weight','price','description','active'];
    protected $primaryKey = 'product_id';

    public function installment($i)
    {
        return ($this->price - ceil( $this->price * 0.3) ) / $i;
    }
    public function installment_formatted($i)
    {
        return number_format( $this->installment($i) );
    }
    
    public function lowest_installment()
    {
        return number_format( ( $this->price - ceil($this->price*0.3) )/Session::get("get_feasible_installments"));
    }
    public function price_formatted()
    {
        return number_format( $this->price );
    }
    public function advance()
    {
        return ceil( $this->price*0.3 );
    }
    public function advance_formatted()
    {
        return number_format( $this->advance() );
    }
    // public function installment()
    // {
    //     return number_format( $this->advance() );
    // }
    // public function installment_formatted()
    // {
    //     return number_format( $this->advance() );
    // }
}
