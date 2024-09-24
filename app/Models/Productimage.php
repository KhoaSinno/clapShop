<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Productimage
 * 
 * @property string $imgID
 * @property string|null $productID
 * @property string|null $image_title
 * @property string|null $image_url
 * @property string|null $type
 * 
 * @property Product|null $product
 *
 * @package App\Models
 */
class Productimage extends Model
{
	protected $table = 'productimage';
	protected $primaryKey = 'imgID';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'productID',
		'image_title',
		'image_url',
		'type'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'productID');
	}
}
