@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @foreach(App\Post::all() as $post)
        <div class="col-md-8">
            <div class="card">
            
            @if($post->event_id==$event)
                <div class="card-header">Posted by {{$post->user->o_name}}&nbsp                 at {{ $post->created_at}}</div>

                    <div class="card-body">
                        {{$post->post}}
                    </div>
            @endif
            </div>
            

        </div>
        <input type="hidden" id="id" name="id" value="sadsad">
    @endforeach
    </div>
</div>
@endsection