<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class NonWorkingDays extends Model {

	//
    protected $fillable = [

        'date',
        'holiday',
        'ateneo',
        'course',
        'note'
    ];

}
