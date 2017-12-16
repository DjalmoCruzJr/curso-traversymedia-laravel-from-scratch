@extends('layouts.app')

@section('content')
    <h1 class="page-header">Create Post</h1>    
    {{ Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'class' => 'form', 'files' => true]) }}
        <div class="form-group">
            {{ Form::label('title','Post Title', ['class' => 'control-label', 'for'=>'title']) }}
            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter the post title...']) }}
        </div>
        <div class="form-group">
            {{ Form::label('body','Post Body', ['class' => 'control-label', 'for'=>'body']) }}
            {{ Form::textarea('body', '', ['class' => 'form-control text-editor', 'placeholder' => 'Enter the post body...', 'rows' => 10]) }}
        </div>
        <div class="form-group">
            {{ Form::label('thumbnail','Select a thumbnail for the post...', ['class' => 'control-label', 'for'=>'thumbnail']) }}
            {{ Form::file('thumbnail', ['class' => 'form-control']) }}
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="/posts" class="btn btn-danger" role="button">Cancel</a>
    {{ Form::close() }}
@endsection