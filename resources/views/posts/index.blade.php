@extends('layouts.app')

@section('content')
    @if(count($posts) > 0)
        @foreach($posts as $post)
        <div class="well">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <img style="width:100%;" src="/storage/images/{{$post->thumbnail}}" class="img-responsive img-thumbnail"/>
            </div>
            <div class="col-md-8 col-sm-8">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Writted on <strong>{{$post->created_at}}</strong> by <strong>{{$post->user->name}}</strong></small> 
            </div>
        </div>
        </div>
        @endforeach

        {{$posts->links()}}
    @else
        <h3>No posts found.</h3>
    @endif
@endsection