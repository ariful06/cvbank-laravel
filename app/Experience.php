<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
	use SoftDeletes;
	
	protected  $fillable = ['designation', 'company_name', 'start_date', 'end_date', 'company_location', 'user_id' ];
    
    protected $dates=['deleted-at'];
}
