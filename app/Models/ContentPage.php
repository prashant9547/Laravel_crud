<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentPage extends Model
{
    protected $collection = 'content_pages';

	protected $fillable = [
	   'id', 'content_title', 'content_des'
    ];
}
