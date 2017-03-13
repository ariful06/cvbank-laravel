<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Hobbie extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

    protected $fillable = ['user_id','title', 'description','image' ];
    
}
