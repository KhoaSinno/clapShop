<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['usersID', 'customerID', 'adminID', 'address', 'totalQuantity', 'totalPrice', 'note', 'paymentMethod', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'usersID');
    }

    public function details()
    {
        return $this->hasMany(Order_Detail::class, 'orderID');
    }
}
