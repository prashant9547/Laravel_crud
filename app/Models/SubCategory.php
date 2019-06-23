<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $collection = 'sub_categories';

	protected $fillable = [
	   'cat_id', 'sub_catName', 'sub_catImg',
   ];
    
    public function category(){
		
        return $this->hasOne('App\Models\Category','id','cat_id');
	}
}
