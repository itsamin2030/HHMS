<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'pre_date',
        'doc_id',
        'pat_id',
        'note',
        'statue',
    ];

//    protected $casts = [
//        'pre_date' => 'datetime',
//    ];
}
