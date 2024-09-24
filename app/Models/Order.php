<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property string $orderID
 * @property string|null $usersID
 * @property string|null $address
 * @property int|null $total_quantity
 * @property Carbon|null $orderDate
 * @property float|null $totalPrice
 * @property string|null $status
 * 
 * @property User|null $user
 * @property Collection|Orderdetail[] $orderdetails
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'orderID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'total_quantity' => 'int',
		'orderDate' => 'datetime',
		'totalPrice' => 'float'
	];

	protected $fillable = [
		'usersID',
		'address',
		'total_quantity',
		'orderDate',
		'totalPrice',
		'status'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'usersID');
	}

	public function orderdetails()
	{
		return $this->hasMany(Orderdetail::class, 'orderID');
	}
}
