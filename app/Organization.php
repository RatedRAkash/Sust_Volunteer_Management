<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $guarded=[];
    //
    public function events(){
        return $this->hasMany('App\Event');
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
