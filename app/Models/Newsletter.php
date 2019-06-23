<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $collection = 'newsletters';

	protected $fillable = [
	   'id','email'
    ];
}
