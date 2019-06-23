<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
    protected $collection = 'parent_categories';

	protected $fillable = [
	   'id', 'status', 'PcategoryName',
    ];
}
