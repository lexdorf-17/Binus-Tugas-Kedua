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
        'order_id', 'order_date', 'product_id', 'product_name', 'price', 'qty', 'total', 'tax'
    ];
}