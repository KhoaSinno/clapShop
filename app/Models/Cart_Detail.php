<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_Detail extends Model
{
    use HasFactory;
    protected $table = 'cart__details';
    protected $fillable = ['usersID', 'total_quantity', 'total_price'];

    public function user()
    {
        return $this->belongsTo(User::class, 'usersID');
    }

    public function details()
    {
        return $this->hasMany(Cart_Detail::class, 'id');
    }
}
