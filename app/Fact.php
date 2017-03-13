<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fact extends Model
{
	 use SoftDeletes;
	 protected $dates = ['deleted_at'];
	

    protected $fillable = ['user_id','id','title', 'no_of_items','image'];
}
