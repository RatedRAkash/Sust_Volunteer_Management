@extends('layouts.app')

@section('content')
            @if(empty($organization->cover_photo))
                <img style="width: 100%" src="{{asset('cover/default.jpg')}}" width="1024px" height="500px">
            @else
                <img style="width: 100%" src="{{ asset('cover/'.$organization->cover_photo) }}" width="1024px" height="500px">    
            @endif
<div class="container">
    <div class="row">
        <div class="organization-profile">
            
        </div>
        <div class="organization-desc" style="margin-top:-125px;"><br>
            @if(empty($organization->logo))
                <img style="border-radius: 100px; margin: 0 54%;" src="{{asset('logo/default.jpg')}}" width="200px" height="200px">
            @else
                <img style="border-radius: 100px; margin: 0 54%;" src="{{asset('logo')}}/{{$organization->logo}}" width="200px" height="200px">    
            @endif
            <h1>{{ Str::title($organization->o_name) }}</h1>
            <p>{{$organization->description}}</p>
            <p><b>{{Str::title($organization->slogan)}}</b></p>
            <p><b>Phone:</b> 0{{$organization->phone}}</p>
            <p><b>Social Media:</b> <a href="{{$organization->website}}"><i class="fab fa-facebook"></i></a></p>
                
            </p>
        </div>
    </div>
</div>
@endsection