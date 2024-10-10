<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'categoryID',
        'name',
        'brand',
        'cpu',
        'ram',
        'storage',
        'screen_size',
        'battery',
        'warranty',
        'os',
        'description',
        'price',
        'stock',
        'active'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID');
    }

    // Mối quan hệ với bảng product_images (lấy tất cả các ảnh)
    public function images()
    {
        return $this->hasMany(Product_Image::class, 'productID');
    }

    // Nếu chỉ muốn lấy một ảnh (ví dụ ảnh đại diện)
    public function mainImage()
    {
        return $this->hasOne(Product_Image::class, 'productID');
    }
}
