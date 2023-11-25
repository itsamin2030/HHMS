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
    protected $fillable = ['birth_year','gender','pat_name','pat_grName','pat_statue','pat_grPhone','pat_note','pat_symptoms','latitude','longitude','pat_nid','pat_dist', 'pat_age', 'pat_admYear','token'];

    public function validation()
    {
    	return [
	    	'pat_name'           => 'required',
            'pat_grName'             => 'required',
            'pat_grPhone'            => 'required|unique',
            'gender'             => 'required',
            'birth_year'         => 'required',
            'pat_dist'         => 'required',
            'pat_nid'         => 'required'
	    ];
    }

}
