<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $collection = 'websites';

	protected $fillable = [
	   'id','sitename_logo','siteName','sitelogo','facebook','linkedin','google_plus','youtube','twitter'
    ];
}
