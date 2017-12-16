@extends('layouts.app')

@section('content')
    <h1 class="page-header">Edit Post</h1>    
    {{ Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'PUT', 'class' => 'form']) }}
        <div class="form-group">
            {{ Form::label('title','Post Title', ['class' => 'control-label', 'for'=>'title']) }}
            {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Enter the post title...']) }}
        </div>
        <div class="form-group">
            {{ Form::label('body','Post Body', ['class' => 'control-label', 'for'=>'body']) }}
            {{ Form::textarea('body', $post->body, ['class' => 'form-control text-editor', 'placeholder' => 'Enter the post body...', 'rows' => 10]) }}
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="/posts" class="btn btn-danger" role="button">Cancel</a>
    {{ Form::close() }}
@endsection