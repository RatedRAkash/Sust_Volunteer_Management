<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class UserProfileController extends Controller
{
    public function __construct(){
        $this->middleware('volunteer');
    }
    public function index()
    {
        return view('profile.index');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'address'=>'required',
            'bio'=>'required|min:20'
        ]);
        $user_id= auth()->user()->id;
        Profile::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'bio'=>request('bio'),
        ]);
        return redirect()->back()->
        with('message','Your Profile Updated Successfully');
    }
    public function store1(Request $request)
    {
        $this->validate($request,[
            'phone_no'=>'required|numeric',
            'registration_no'=>'required|numeric',
            'depertment'=>'required'

        ]);
        $user_id= auth()->user()->id;
        Profile::where('user_id',$user_id)->update([
            'depertment'=>request('depertment'),
            'registration_no'=>request('registration_no'),
            'phone_no'=>request('phone_no'),
        ]);
        return redirect()->back()->
        with('message1','Information added/updated');
    }
    public function picture(Request $request)
    {
        $this->validate($request,[
            'profile_picture'=>'required|mimes:jpg,png,jpeg'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasFile('profile_picture')){
            $file = $request->file('profile_picture');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('uploads/pp',$fileName);
            Profile::where('user_id',$user_id)->update([
                'profile_picture'=>$fileName
            ]);
            return redirect()->back()->with('message2','Profile Picture Uploaded Successfully');
        }
    }
}
