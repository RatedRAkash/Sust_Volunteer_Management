<?php

namespace App;
use App\Event;

use Illuminate\Database\Eloquent\Model;

class Approve extends Model
{
    protected $guarded = [];
    //
    public function event(){
        return $this->belongsTo('App\Event');
    }
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();;
    }
}
