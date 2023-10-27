<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'pat_id',
        'statue',
        'patStatue',
        'recommand',
    ];
}
