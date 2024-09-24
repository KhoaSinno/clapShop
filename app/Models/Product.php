<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property string $productID
 * @property string|null $categoryID
 * @property string|null $productName
 * @property string|null $brand
 * @property string|null $cpu
 * @property string|null $ram
 * @property string|null $storage
 * @property string|null $screen_size
 * @property string|null $battery
 * @property string|null $wanrranty
 * @property string|null $os
 * @property string|null $description
 * @property float|null $price
 * @property int|null $quantity
 * 
 * @property Category|null $category
 * @property Collection|Cartdetail[] $cartdetails
 * @property Collection|Orderdetail[] $orderdetails
 * @property Collection|Productimage[] $productimages
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'product';
	protected $primaryKey = 'productID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'price' => 'float',
		'quantity' => 'int'
	];

	protected $fillable = [
		'categoryID',
		'productName',
		'brand',
		'cpu',
		'ram',
		'storage',
		'screen_size',
		'battery',
		'wanrranty',
		'os',
		'description',
		'price',
		'quantity'
	];

	public function category()
	{
		return $this->belongsTo(Category::class, 'categoryID');
	}

	public function cartdetails()
	{
		return $this->hasMany(Cartdetail::class, 'productID');
	}

	public function orderdetails()
	{
		return $this->hasMany(Orderdetail::class, 'productID');
	}

	public function productimages()
	{
		return $this->hasMany(Productimage::class, 'productID');
	}
}
