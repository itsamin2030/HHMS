<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medciPrescription extends Model
{
    protected $fillable = [
        'pre_id',
        'med_id',
        'dose',
        'itr',
        'durtion',
        'note',
    ];
}
