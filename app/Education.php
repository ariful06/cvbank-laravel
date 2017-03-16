<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
	protected $table = 'educations';
    protected $fillable = ['user_id','title', 'institute', 'result', 'passing_year', 'main_subject', 'education_board', 'course_duration',  ];
    
    protected $dates=['deleted-at'];

}
