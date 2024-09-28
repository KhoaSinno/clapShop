<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
	protected $table = 'order__details';

    protected $fillable = ['orderID', 'productID', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'orderID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }
}
