<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adminprofile extends Model
{
    protected $collection = 'adminprofiles';

    protected $fillable = [
        'id','role_id', 'user_id', 'firstName','lastName','cell','pic','addr','zipcode','country','city','state','status'
     ];
}
