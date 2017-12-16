@extends('layouts.app')

@section('content')
    @if(count($posts) > 0)
        @foreach($posts as $post)
        <div class="well">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Writted on <strong>{{$post->created_at}}</strong> by <strong>{{$post->user->name}}</strong></small> 
        </div>
        @endforeach

        {{$posts->links()}}
    @else
        <p>Oppss!! No Posts found.</p>
    @endif
@endsection