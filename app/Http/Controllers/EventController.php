<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Organization;
use App\Approve;

class EventController extends Controller
{
    private $id;

    
    //public function globla () {
        //return $this->id;
    //}

    //public function __construct(int $value) {
        //echo "here";
        //$this->id = $value;
    //}

    public function index()
    {
        $events = Event::latest()->limit(10)->get();
        $organizations = Organization::latest()->limit(12)->get();
        return view('welcome',compact('events', 'organizations'));
    }
    public function show(Event $event)
    {
        //_//_construct(5);
       // globla();
        return view('events.show',compact('event'));
    }

    public function create()
    {
        return view('events.create');
    }
    public function post(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'address'=>'required',
            'duties'=>'required',
            'roles'=>'required',
            'date'=>'required',          
        ]);
        $user_id=auth()->user()->id;
        $organization=Organization::where('user_id',$user_id)->first();
        $organization_id=$organization->id;
        Event::create([
            'user_id'=>$user_id,
            'organization_id'=>$organization_id,
            'title'=>request('title'),
            'description'=>request('description'),
            'address'=>request('address'),
            'duties'=>request('duties'),
            'roles'=>request('roles'),
            'date'=>request('date'),
            'category_id'=>request('category')
        ]);
        return redirect()->back()->with('message','Event posted Successfully');
    }
    public function myevents()
    {
        $events=Event::where('user_id',auth()->user()->id)->get();
        return view('events.myevents',compact('events'));
    }
    public function delete(Request $request,$id)
    {
        
        //dd($id);
        $data = Event::find($id);
        //dd($data);
        $data->delete();
        return redirect('/event/myevent');
    }
    public function apply(Request $request,$id)
    {
        $eventId = Event::find($id);
        $eventId -> users()->attach(auth()->user()->id);
        return redirect()->back()->with('message','Event applied successfully');
    }
    public function approve(Request $request, $id, $u_id){
        $userId= $id;
        $eventID = $u_id;
        $event = Event::find($eventID);
        $applicants = Event::has('users')->where('user_id',auth()->user()->id)->get();
        $approves=Approve::create([
            'event_id'=>$eventID,
            'user_id'=>$userId,
            'status'=>0,
            'title'=>$event->title,
        ])->get();

        $user = User::where('id',$userId)->first();
        $event = Event::where('id',$eventID)->first();
        return view('events.volunteers',compact('user','event'));
    }
    public function deny(Request $request, $id, $u_id){
        $userId= $id;
        $eventID = $u_id;
        Approve::create([
            'event_id'=>$eventID,
            'user_id'=>$userId,
            'status'=>1
        ]);
        return redirect()->back()->with('message','Denied');
    }
    public function pending(){
        $approves=Approve::where('user_id',auth()->user()->id)->get();
        return view('profile.pending',compact('approves'));
    }
    public function applicants(){
        $applicants = Event::has('users')->where('user_id',auth()->user()->id)->get();
        return view('events.applicants',compact('applicants'));
    }
    public function allevents(Request $request){
        $title = request('title');
        $category = request('category_id');
        $address = request('address');
        if($title || $category || $address){
            $events = Event::where('title','like','%' .$title.'%')
                ->orWhere('category_id',$category)
                ->orWhere('address',$address)
                ->paginate(10);
            return view('events.allevents',compact('events'));
        }else
        {$events=Event::paginate(10);
        return view('events.allevents',compact('events'));
    }
    }
    public function showpost(Request $request,$event){
        return view('events.eventpost',compact('event'));
    }
}
