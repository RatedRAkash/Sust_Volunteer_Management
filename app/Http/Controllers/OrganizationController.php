<?php

namespace App\Http\Controllers;
use App\Organization;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    //
    public function index(Organization $organization)
    {
        return view('organization.index',compact('organization'));
    }
    public function create()
    {
        return view('organization.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'description'=>'required',
            'phone'=>'required|numeric'
        ]);
        $user_id= auth()->user()->id;
        Organization::where('user_id',$user_id)->update([
            'description'=>request('description'),
            'slogan'=>request('slogan'),
            'phone'=>request('phone'),
            'website'=>request('website')
        ]);
        return redirect()->back()->
        with('message','Organization Profile Updated Successfully');
    }
    public function coverphoto(Request $request)
    {
        $this->validate($request,[
            'cover_photo'=>'required|mimes:jpg,png,jpeg'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasFile('cover_photo')){
            $file = $request->file('cover_photo');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('cover',$fileName);
            Organization::where('user_id',$user_id)->update([
                'cover_photo'=>$fileName
            ]);
            return redirect()->back()->with('message2','Cover Photo Uploaded Successfully');
        }
    }
    public function logo(Request $request)
    {
        $this->validate($request,[
            'logo'=>'required|mimes:jpg,png,jpeg'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('logo',$fileName);
            Organization::where('user_id',$user_id)->update([
                'logo'=>$fileName
            ]);
            return redirect()->back()->with('message3','Logo Uploaded Successfully');
        }
    }
}
