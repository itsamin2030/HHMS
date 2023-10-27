<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    use HasFactory;
    protected $table = 'medicals';
    protected $primaryKey = 'doc_id';
    protected $fillable = ['doc_name', 'doc_phone','doc_address', 'doc_email', 'doc_password', 'doc_profile','doc_id'];

    public function validation()
    {
    	return [
	    	'doc_name'           => 'required',
            'doc_phone'          => 'required',
            'doc_email'          => 'required',
            'doc_password'       => 'required'
	    ];
    }
}
