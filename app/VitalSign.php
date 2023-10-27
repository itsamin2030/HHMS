<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VitalSign extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'pat_id',
        'vsNum',
        'vsNum2',
        'type',
        'userBy',
    ];
}
