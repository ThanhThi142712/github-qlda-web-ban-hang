<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table ="bills";
    public function bill_deteil(){
    	return $this->hasMany('App\BillDeteil','id_bill','id');
    }
     public function bill(){
    	return $this->belongsTo('App\Customer','id_customer','id');
    }


}
