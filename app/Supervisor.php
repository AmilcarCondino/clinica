<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model {

	//
    protected $fillable = [

        'name',
        'last_name',
        'phone',
        'cell_phone',
        'email'
    ];

}
