@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create your post</div>

                <div class="card-body">
                <form action="{{route('post.submit')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Post</label>
                        <textarea id="post" name="post" rows="4" class="form-control"></textarea>
                        <input type="hidden" id="id" name="id" value="{{$event}}">
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
    </div>
</div>
@endsection
