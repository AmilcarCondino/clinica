<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model {

	//
    protected $fillable = [

        'name',
        'last_name',
        'dni',
        'phone',
        'cell_phone',
        'address',
        'birth_date',
        'send_for',
        'retired',
        'student',
        'occupation',
        'masc_atten',
        'fem_atten',
        'pb_atten'
    ];

}
