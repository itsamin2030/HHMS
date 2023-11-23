<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'pat_id',
        'app_datetime',
        'statue',
        'patStatue',
        'recommand',
    ];

    public function validation()
    {
        return [
            'app_datetime'           => 'required',
            'pat_id'           => 'required',
            'statue'             => 'required'
        ];
    }
}
