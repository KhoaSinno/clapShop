<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
    use HasFactory;
    protected $table = 'product__images';
    protected $fillable = ['productID', 'image_url', 'type'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }


}
