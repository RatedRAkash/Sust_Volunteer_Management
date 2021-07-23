@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post your event') }}</div>

                <div class="card-body">
                    <form action="{{route('events.post')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    @if($errors->has('title'))
                            <div class="error" style="color: red">
                                {{$errors->first('title')}}
                            </div>
                    @endif
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    @if($errors->has('description'))
                            <div class="error" style="color: red">
                                {{$errors->first('description')}}
                            </div>
                    @endif
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control"></textarea>
                    </div>
                    @if($errors->has('address'))
                            <div class="error" style="color: red">
                                {{$errors->first('address')}}
                            </div>
                    @endif
                    <div class="form-group">
                        <label>Responsibilities</label>
                        <textarea name="duties" class="form-control"></textarea>
                    </div>
                    @if($errors->has('duties'))
                            <div class="error" style="color: red">
                                {{$errors->first('duties')}}
                            </div>
                    @endif
                    <div class="form-group">
                        <label>Roles</label>
                        <input type="text" name="roles" class="form-control">
                    </div>
                    @if($errors->has('roles'))
                            <div class="error" style="color: red">
                                {{$errors->first('roles')}}
                            </div>
                    @endif
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    @if($errors->has('date'))
                            <div class="error" style="color: red">
                                {{$errors->first('date')}}
                            </div>
                    @endif
                    <div class="form-group">
                        <label>Event Category</label>
                        <select name="category" class="form-control">
                        @foreach(App\Category::all() as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    

                    
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                    @endif
                    <div class="form-group">
                        <button class="btn btn-outline-primary">Submit</button>
                    </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
