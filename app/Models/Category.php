<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $collection = 'categories';

	protected $fillable = [
	   'id','catName', 'catImg', 'pCate_id',
    ];

    public function pcategory()
    {
        // return $this->belongsTo('App\Post');
        return $this->hasOne('App\Models\ParentCategory','id','pCat_id');
    }

}
