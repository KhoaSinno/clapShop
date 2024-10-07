<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'categoryID', 'name', 'brand', 'cpu', 'ram', 'storage', 'screen_size', 'battery', 'warranty', 'os', 'description', 'price', 'stock', 'active'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID');
    }

    public function images()
    {
        return $this->hasMany(Product_Image::class, 'id');
    }

}
