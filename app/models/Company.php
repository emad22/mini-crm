<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = ['name','email','logo','website'];
    public $timestamps = false;

    public function employee(){
        return $this->hasMany('App\Employee', 'company_id', 'id');
    }
    
}
