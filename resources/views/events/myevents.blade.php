@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
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
                        <td>
                            <form action="{{route('events.delete',[$event->id])}}" method="post">
                            @csrf
                                <button class="btn btn-success btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
