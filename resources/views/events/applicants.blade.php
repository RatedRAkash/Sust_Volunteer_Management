@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            @foreach($applicants as $applicant) 
                <div class="card">
                    <div class="card-header">{{$applicant->title}}</div>
                    
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone No</th>
                                <th>Registartion No</th>
                                <th>Department</th>
                            </thead>
                            @foreach($applicant->users as $user)
                            <tbody>
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->profile->address}}</td>
                                    <td>{{$user->profile->phone_no}}</td>
                                    <td>{{$user->profile->registration_no}}</td>
                                    <td>{{$user->profile->depertment}}</td>
                                    <td>
                                   
                                    <form action="{{route('organization.approval',[$user->id,$applicant->id])}}" method="post">
                                    @csrf
                                        <button class="btn btn-success btn-sm">Approve</button>
                                    </form>
                                    </td>
                                    <td>
                                    <td>
                                    <form action="{{route('organization.denial',[$user->id,$applicant->id])}}" method="post">
                                    @csrf
                                        <button class="btn btn-success btn-sm">Deny</button>
                                    </form>
                                    </td>

                                </tr>
                            </tbody>

                            @endforeach
                        </table>
                       
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
