@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            @foreach($approves as $approve)
            @if($approve->status==0)
                <div class="card">
                    <div class="card-header">{{$approve->title}}</div>
                    
                    <div class="card-body">
                        <table class="table">
                            
                            
                            <tbody>
                                <tr>
                                
                                    <td>Your application for perticipation is approved</td>
                                    
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection




