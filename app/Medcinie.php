<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medcinie extends Model
{
    protected $fillable = [
        'med_name',
        'genName',
    ];
}
