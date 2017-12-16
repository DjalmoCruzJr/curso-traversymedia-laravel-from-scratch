@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default btn-sm">Go Back</a>
    <div class="page-header">
        <h1>{{$post->title}}</h1>
        <small>Writted on <strong>{{$post->created_at}}</strong> by <strong>{{$post->user->name}}</strong></small>
    </div>
    <div class="row">
        <div class="col-md-12">
            <img src="/storage/images/{{$post->thumbnail}}" class="img-responsive img-thumbnail"/>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            {!!$post->body!!}
        </div>
    </div>
    @if(!Auth::guest() && Auth::user()->id == $post->user_id)
    <div class="row" style="margin-top:20px;">
        <div class="col-md-12">
            {{ Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'DELETE', 'class' => 'pull-right']) }}
                {{ Form::submit("Delete", ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary pull-right" style="margin-right:5px;">Edit<a/>
        </div>
    </div>
    @endif
@endsection