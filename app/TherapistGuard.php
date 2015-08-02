<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TherapistGuard extends Model {

	//
    protected $fillable = [

        'therapist_id',
        'start_date',
        'end_date',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'turn',
        'office'
    ];

    /**
     * A Guard its owned by a Therapist.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function therapist()
    {

        return $this->belongsTo('App\Therapist');
    }

}
