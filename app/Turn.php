<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model {

	//

    protected $fillable = [

        'appointment',
        'turn',
        'patient_id',
        'office_id',
        'therapist_id',
        'observer_id'
    ];

}
