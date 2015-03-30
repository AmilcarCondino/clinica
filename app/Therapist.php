<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Therapist extends Model {


    protected $fillable = [

        'name',
        'last_name',
        'dni',
        'phone',
        'cell_phone',
        'career_year',
        'email'
    ];

}
