@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            
                            
                            <tbody>
                                <tr>
                                <td>{{$user->name}} has been added to {{$event->title}} as {{$event->roles}}</td>  
                                </tr>
                            </tbody>
                            
                        </table> 
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection




