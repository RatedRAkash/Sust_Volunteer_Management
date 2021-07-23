@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$event->title}}</div>

                <div class="card-body">
                    <p>
                        <h3>Description</h3>
                        {{$event->description}}
                    </p>  
                    <p>
                        <h3>Responsibilities</h3>
                        {{$event->duties}}
                    </p> 
                    <p>
                        <h3>Roles</h3>
                        {{$event->roles}}
                    </p> 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Short Info</div>

                <div class="card-body">
                    <p>Organization: <a href="{{route('organization.index',[$event->organization->id,$event->organization->o_name])}}">
                            {{$event->organization->o_name}}
                        </a>
                    </p>
                    <p>Address:{{$event->address}}</p>
                    <p>Date:{{$event->date}}</p>

                </div>
                @if(Auth::user()->user_type=='volunteer')
                @if(!$event->checkApplication())
                    <form action="{{route('events.apply',[$event->id])}}" method="post">
                    @csrf
                    <button class="btn btn-warning">Perticipate</button>
                    </form>
                
                @endif
                @endif
                @if(Auth::user()->user_type=='organizer')
                    @if(Auth::user()->id==$event->user_id)
                        <a href="{{route('post.post',[$event->id])}}">
                            <button class="btn btn-success btn-sm">Post</button>
                        </a>
                    @endif
                @endif
                <a href="{{route('show.post',[$event->id])}}">
                    <button class="btn btn-success btn-sm">See Post</button>
                </a>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
