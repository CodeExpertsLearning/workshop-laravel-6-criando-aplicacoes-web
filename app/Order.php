<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
		'items', 'status_pagseguro', 'code_pagseguro'
	];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
