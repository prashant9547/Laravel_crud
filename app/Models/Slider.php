<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $collection = 'sliders';

	protected $fillable = [
	   'id','slider_title', 'slider_caption','button_text','button_url','slider_img'
    ];
}
