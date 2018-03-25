<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

class Product extends Model
{
	protected $fillable=['naam','beschrijving','prijs','afbeelding','category_id'];

	public function category()
	{
		return $this->belongsTo('App\Category');
	}
}
