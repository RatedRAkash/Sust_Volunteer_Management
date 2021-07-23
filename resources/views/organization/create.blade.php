@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->organization->logo))
                <img style="width: 100%" src="{{asset('logo/default.jpg')}}" width="100" height="300">
            @else
                <img style="width: 100%" src="{{asset('logo')}}/{{Auth::user()->organization->logo}}" width="100" height="300">    
            @endif
            <form action="{{route('org.logo')}}" method="post" enctype="multipart/form-data">
            <br>
                @csrf
                <div class="card">
                    <div class="card-header">Select logo</div>
                    <div class="card-body">
                        <input type="file" name="logo" class="form-control">
                        <br>
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message2')}}
                    </div>
                @endif
                @if($errors->has('logo'))
                    <div class="error" style="color: red">
                        {{$errors->first('logo')}}
                    </div>
                @endif
            </form>
        </div>
        <div class="col-md-5">
            
            <div class="card">
                <div class="card-header">Update Organization's Information</div>
                    <div class="card-body">
                        <form action="{{route('organization.store1')}}" method="post">
                            <div class="form-group">
                            @csrf
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description"></textarea>
                            </div>
                                @if($errors->has('description'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('description')}}
                                    </div>
                                @endif
                            <div class="form-group">
                                <label>Slogan</label>
                                <textarea class="form-control" rows="3" name="slogan"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                                @if($errors->has('phone'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('phone')}}
                                    </div>
                                @endif
                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" name="website" class="form-control">
                            </div>
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
                            <p><b>Organization:</b><a href="{{route('organization.index',[Auth::user()->organization->id,Auth::user()->organization->o_name])}}"> {{Auth::user()->organization->o_name}}</a></p>
                            
                            <p><b>Description:</b> {{Auth::user()->organization->description}}</p>
                            <p><b>Slogan:</b> {{Auth::user()->organization->slogan}}</p>
                            <p><b>Website:</b> {{Auth::user()->organization->website}}</p>
                            <p><b>Phone:</b>{{Auth::user()->organization->phone}}</p> 
                        <div>
                </div>
            </div>
            <form action="{{route('org.cover')}}" method="POST" enctype="multipart/form-data">       
                @csrf
                <div class="card">
                    <div class="card-header">Update your cover Photo</div>
                        <div class="card-body">
                            <input type="file" name="cover_photo" class="form-control">
                            <br>
                            <button class="btn btn-success">Update</button>
                        </div>
                        @if($errors->has('cover_photo'))
                            <div class="error" style="color: red">
                                {{$errors->first('cover_photo')}}
                            </div>
                        @endif
                </div>
                @if(Session::has('message2'))
                    <div class="alert alert-success">
                        {{Session::get('message2')}}
                    </div>
                @endif
            </form>
            
    </div>
</div>
@endsection
