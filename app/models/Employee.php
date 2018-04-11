<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'employees';
    protected $fillable = ['fname','lname','email','phone','company_id'];
    public $timestamps = false;



    public function company(){
        return $this->belongsTo('App\models\Company', 'company_id');
    }
}
