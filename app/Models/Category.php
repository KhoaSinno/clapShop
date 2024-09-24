<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property string $caterogyID
 * @property string|null $caterogyName
 * 
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'category';
	protected $primaryKey = 'caterogyID';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'caterogyName'
	];

	public function products()
	{
		return $this->hasMany(Product::class, 'categoryID');
	}
}
