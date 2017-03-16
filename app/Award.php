<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Award extends Model
{
	use SoftDeletes;
   protected  $fillable = ['title', 'organization', 'description', 'location', 'year', 'user_id' ];
    protected $dates=['deleted-at'];
}
