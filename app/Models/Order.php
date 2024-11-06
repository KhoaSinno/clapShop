<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['customerID', 'adminID', 'address', 'totalQuantity', 'totalPrice', 'note', 'paymentMethod', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'customerID'); // Quan hệ với khách hàng
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'adminID'); // Quan hệ với admin
    }

    public function details()
    {
        return $this->hasMany(Order_Detail::class, 'orderID');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customerID')->where('role', 'customer');
    }
}
