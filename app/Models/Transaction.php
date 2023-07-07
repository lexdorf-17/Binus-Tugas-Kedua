<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Transaction extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'id', 'created_at', 'product_id', 'product_name','base_price', 'sell_price', 'qty', 'sub_total', 'tax', 'total'
    ];
}