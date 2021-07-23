@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>"Recent Events"</h1>
            <table class="table">
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                 @foreach ($events as $event)
                    <tr>
                        <td>
                            Title: {{$event->title}}
                        </td>
                        <td>
                            <i class="fa fa-map-marker"></i> Address: {{$event->address}}
                        </td>
                        <td>
                             Date: {{$event->date}}
                        </td>
                        <td>
                            <a href="{{route('events.show',[$event->id,$event->title])}}">
                                <button class="btn btn-success btn-sm">Details</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <a href="{{route('allevents')}}">
                <button class="btn btn-warning">All events</button>
            </a>
            
        </div><br><br>
        <h1>Feature Organization</h1>
        
        <div class="container">
            <div class="row">
                @foreach($organizations as $organization)
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                            <h5 class="card-title">{{$organization->o_name}}</h5>
                            <p class="card-text">{{\Illuminate\Support\Str::limit($organization->description,20)}}</p>
                            <a href="{{route('organization.index',[$organization->id,$organization->o_name])}}" class="btn btn-primary">View Organization</a>
                            </div>
                        </div>
                    </div>
                @endforeach    
            </div>
        
    </div>
@endsection
