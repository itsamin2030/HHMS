<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class patientMedcinie extends Model
{
    protected $fillable = [
        'pat_id',
        'med_id',
    ];
}
