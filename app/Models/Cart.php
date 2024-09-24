<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 * 
 * @property string $cartID
 * @property string|null $usersID
 * @property int|null $total_quantity
 * @property float|null $total_price
 * 
 * @property User|null $user
 * @property Collection|Cartdetail[] $cartdetails
 *
 * @package App\Models
 */
class Cart extends Model
{
	protected $table = 'cart';
	protected $primaryKey = 'cartID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'total_quantity' => 'int',
		'total_price' => 'float'
	];

	protected $fillable = [
		'usersID',
		'total_quantity',
		'total_price'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'usersID');
	}

	public function cartdetails()
	{
		return $this->hasMany(Cartdetail::class, 'cartID');
	}
}
