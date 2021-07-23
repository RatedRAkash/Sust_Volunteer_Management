@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>"Recent Events"</h1>
            <form action="{{route('allevents')}}" method="get">
            <div class="form-inline">
                <div class="form-group">
                    <label>Title&nbsp;&nbsp;</label>
                    <input type="text" name="title" class="form-control">
                </div>&nbsp;&nbsp;
                <div class="form-group">
                    <label>Category&nbsp;&nbsp;</label>
                        <select name="category_id" class="form-control">
                        <option>Select Category</option>
                            @foreach(App\Category::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                </div>&nbsp;&nbsp;
                <div class="form-group">
                    <label>Address&nbsp;&nbsp;</label>
                    <input type="text" name="address" class="form-control">
                </div>&nbsp;&nbsp;
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-dark">Search</button>
                </div>
            </form>
            
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
                                <button  class="btn btn-success btn-sm">Details</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$events->links()}}
        </div>
    </div>
        
        
@endsection
