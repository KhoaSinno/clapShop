<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cartdetail
 * 
 * @property string $cartDetailID
 * @property string|null $cartID
 * @property string|null $productID
 * @property int|null $quantity
 * 
 * @property Product|null $product
 * @property Cart|null $cart
 *
 * @package App\Models
 */
class Cartdetail extends Model
{
	protected $table = 'cartdetail';
	protected $primaryKey = 'cartDetailID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'quantity' => 'int'
	];

	protected $fillable = [
		'cartID',
		'productID',
		'quantity'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'productID');
	}

	public function cart()
	{
		return $this->belongsTo(Cart::class, 'cartID');
	}
}
