<?php

namespace App;
use App\Post;
use App\Approve;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];
    public function getRouteKeyName()
    {
        return 'id';
    }
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function checkApplication(){
        return \DB::table('event_user')->where('user_id',auth()->user()->id)->where('event_id', $this->id)->exists();
    }
    public function post(){
        return $this->hasMany('App\Post');
    }
    public function approve(){
        return $this->belongsTo('App\Approve');
    }
}
