@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Dashboard</div>
				<div class="panel-body">
					<a href="/posts/create" class="btn btn-primary" role="button">Create Post</a>
					<h3>Hi {{Auth::user()->name}}, welcome to your blog posts</h3>
					@if(count($posts) > 0)
					<table class="table table-striped">
						<tr>
							<th>#</th>
							<th>Title</th>
							<th class="hidden-xs">Created At</th>
							<th></th>
						</tr>
						@foreach($posts as $post)
						<tr>
							<td>{{$post->id}}</td>
							<td>{{$post->title}}</td>
							<td class="hidden-xs">{{$post->created_at}}</td>
							<td>
								{{ Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'DELETE', 'class' => "pull-right"]) }}
								<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
								{{ Form::close() }}
								<a href="/posts/{{$post->id}}/edit" class="btn btn-primary pull-right" style="margin-right:5px;"><i class="fa fa-pencil"></i></a>
							</td>
						</tr>
						@endforeach
					</table>
						{{$posts->links()}}
					@else 
						<p>You haven't posts!</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection