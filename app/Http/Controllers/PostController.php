<?php

namespace App\Http\Controllers;
use App\Event;
use App\Post;
use App\Organization;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //public $id;
    //public function setID($ID)
    //{
       // $this->id = $ID;
    //}

   // public function getID()
    //{
        //return $this->id;
  //  }/

    public function show(Request $request,$event)
    {
        //setID($event);
        //return $id;
        return view('events.post',compact('event'));
    }
    public function submit(Request $request)
    {
        $user_id=auth()->user()->id;
        $organization=Organization::where('user_id',$user_id)->first();
        $organization_id=$organization->id;
        //$event=Event::where('user_
        //id',$user_id)->first();
        //$event_id=$event->id;
        //$event_id=$this->id;
        //return getID();
         Post::create([
             'user_id'=>$organization_id,
             'event_id'=> $request-> id,
             'post'=> $request->post,
         ]);
        return redirect()->back()->with('message','Posted Successfully');
    }
}
