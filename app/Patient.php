<?php

namespace App;

use Malhal\Geographical\Geographical;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    use Geographical;
    protected $table = 'patients';
    protected $primaryKey = 'pat_id';
    protected $fillable = ['birth_year','gender','pat_id','pat_name','pat_grName','pat_statue','pat_grPhone','pat_note','pat_symptoms','latitude','longitude'];

    public function validation()
    {
    	return [
	    	'pat_name'           => 'required',
            'grName'             => 'required',
            'grPhone'            => 'required',
            'gender'             => 'required',
            'birth_year'         => 'required',
            'pat_statue'         => 'required'
	    ];
    }

}
