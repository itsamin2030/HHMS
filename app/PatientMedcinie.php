<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientMedcinie extends Model
{
    protected $fillable = [
        'pat_id',
        'med_id',
    ];
}
