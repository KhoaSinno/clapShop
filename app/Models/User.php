<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'role',
        'password',
        'fullname',
        'email',
        'phone',
        'address',
        'gender',
        'dateOfBirth',
    ];

    public function hasRole($role)
    {
        return $this->role === $role;
    }
    public function cart()
    {
        return $this->hasOne(Cart::class, 'usersID');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customerID');
    }
}
