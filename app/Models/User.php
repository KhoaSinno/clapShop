<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable; // Thêm dòng này
use Illuminate\Notifications\Notifiable; // Thêm dòng này
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property string $usersID
 * @property string|null $username
 * @property string|null $role
 * @property string|null $password
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $gender
 * @property Carbon|null $dateOfBirth
 *
 * @property Collection|Cart[] $carts
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class User extends Authenticatable // Thay đổi ở đây
{
    use Notifiable; // Thêm dòng này

    protected $table = 'users';
    protected $primaryKey = 'usersID';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'dateOfBirth' => 'datetime'
    ];

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'username',
        'role',
        'password',
        'email',
        'phone',
        'address',
        'gender',
        'dateOfBirth'
    ];

    // Thêm phương thức hasRole
    public function hasRole($role)
    {
        return $this->role === $role; // So sánh vai trò
    }
    
    public function carts()
    {
        return $this->hasMany(Cart::class, 'usersID');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'usersID');
    }
}
