@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->profile->profile_picture))
                <img style="width: 100%" src="{{asset('pro/avatar.jpg')}}" width="100" height="300">
            @else
                <img style="width: 100%" src="{{asset('uploads//pp')}}/{{Auth::user()->profile->profile_picture}}" width="100" height="300">    
            @endif
            <form action="{{route('profile.picture')}}" method="post" enctype="multipart/form-data">
            <br>
                @csrf
                <div class="card">
                    <div class="card-header">Change your Profile Picture</div>
                    <div class="card-body">
                        <input type="file" name="profile_picture" class="form-control">
                        <br>
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message2')}}
                    </div>
                @endif
                @if($errors->has('profile_picture'))
                    <div class="error" style="color: red">
                        {{$errors->first('profile_picture')}}
                    </div>
                @endif
            </form>
        </div>
        <div class="col-md-5">
            
            <div class="card">
                <div class="card-header">Update Your Information</div>
                    <div class="card-body">
                        <form action="{{route('profile.store')}}" method="post">
                            <div class="form-group">
                            @csrf
                                <label>Address</label>
                                <textarea class="form-control" rows="3" name="address"></textarea>
                            </div>
                                @if($errors->has('address'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('address')}}
                                    </div>
                                @endif
                            <div class="form-group">
                                <label>Bio</label>
                                <textarea class="form-control" rows="3" name="bio"></textarea>
                            </div>
                                @if($errors->has('bio'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('bio')}}
                                    </div>
                                @endif
                            <div class="form-group">
                                <button class="btn btn-success">Submit</button>
                            </div>
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                        </form>
                    </div>
            </div>
        </div>

        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Volunteer Details</div>
                        <div class="card-body">
                            <p><b>Name:</b> {{Auth::user()->name}}</p>
                            <p><b>Email:</b> {{Auth::user()->email}}</p>
                            <p><b>Address:</b> {{Auth::user()->profile->address}}</p>
                            <p><b>Bio:</b> {{Auth::user()->profile->bio}}</p>
                            <p><b>Registration No:</b> {{Auth::user()->profile->registration_no}}</p>
                            <p><b>Department:</b> {{Auth::user()->profile->depertment}}</p>
                            <p><b>Phone:</b>+880{{Auth::user()->profile->phone_no}}</p>
                        <div>
                </div>
            </div>
        
        
                <div class="card">
                    <div class="card-header">Edit Details</div>
                        <div class="card-body">
                        <form action="{{route('profile1.store1')}}" method="post">
                        @csrf
                            <label for="registration_no">Registration No: </label>
                            <input value="{{Auth::user()->profile->registration_no}}" type="tel" id="registration_no" name="registration_no" >
                            <label for="phone_no">Phone number : </label>
                            <input value="{{Auth::user()->profile->phone_no}}" type="tel" id="phone_no" name="phone_no" >
                                
                            <label for="depertment">Department: </label>
                            <input value="{{Auth::user()->profile->depertment}}" type="text" id="depertment" name="depertment" ><br>
                            <button class="btn btn-primary">Update</button>   
                        <div>
                            @if(Session::has('message1'))
                                <div class="alert alert-success">
                                    {{Session::get('message1')}}
                                </div>
                                @endif
                                @if($errors->has('phone_no'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('phone_no')}}
                                    </div>
                                @endif
                                @if($errors->has('registration_no'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('registration_no')}}
                                    </div>
                                @endif
                                @if($errors->has('depertment'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('depertment')}}
                                    </div>
                                @endif
                        </form>
                </div>
            </div>
    </div>
</div>
@endsection
