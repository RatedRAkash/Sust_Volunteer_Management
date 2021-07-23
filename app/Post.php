<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [];

    public function post(){
        return $this->belongsTo('App\Event');
    }
    public function user(){
        return $this->belongsTo('App\Organization');
    }
}
