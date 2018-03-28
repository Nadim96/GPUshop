<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = ['user_id', 'total', 'delivered'];

    public function orderItems()
    {
    	return $this->belongsToMany(Product::class)->withPivot('qty', 'total');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
