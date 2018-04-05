<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'employees';
    // protected $fillable = ['name','email','logo','website'];
    public $timestamps = false;



    public function company(){
        return $this->belongsTo('App\models\Company', 'company_id');
    }
}
