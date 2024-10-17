<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password_Reset extends Model
{
    use HasFactory;
    // Tên bảng
    protected $table = 'password_resets';

    // Các cột có thể được gán giá trị (Mass Assignable)
    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];

    // Tắt các thuộc tính timestamps (vì bạn đã có trường created_at riêng)
    public $timestamps = false;

    // Định nghĩa quan hệ với bảng users (nếu cần)
    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
