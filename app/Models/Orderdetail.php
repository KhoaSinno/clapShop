<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Orderdetail
 * 
 * @property string $orderDetailID
 * @property string|null $orderID
 * @property string|null $productID
 * @property int|null $quantity
 * @property float|null $price
 * 
 * @property Product|null $product
 * @property Order|null $order
 *
 * @package App\Models
 */
class Orderdetail extends Model
{
	protected $table = 'orderdetail';
	protected $primaryKey = 'orderDetailID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'quantity' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'orderID',
		'productID',
		'quantity',
		'price'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'productID');
	}

	public function order()
	{
		return $this->belongsTo(Order::class, 'orderID');
	}
}
