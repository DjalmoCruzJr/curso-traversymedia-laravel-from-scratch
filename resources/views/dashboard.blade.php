@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Dashboard</div>

				<div class="panel-body">
					<a href="/posts/create" class="btn btn-primary" role="button">Create Post</a>
					<h3>Hi {{Auth::user()->name}}, welcome to your blog posts</h3>
					@if(count($posts) > 0)
					<br/>
					<table class="table table-striped">
						<tr>
							<th>#</th>
							<th>Post Title</th>
							<th>Created At</th>
							<th></th>
						</tr>
						@foreach($posts as $post)
						<tr>
							<td>{{$post->id}}</td>
							<td>{{$post->title}}</td>
							<td>{{$post->created_at}}</td>
							<td>
								{{ Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'DELETE', 'class' => "pull-right"]) }}
								<button type="submit" class="btn btn-danger">Delete</button>
								{{ Form::close() }}
								<a href="/posts/{{$post->id}}/edit" class="btn btn-primary pull-right" style="margin-right:5px;">Edit</a>
							</td>
						</tr>
						@endforeach
					</table>
						{{$posts->links()}}
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection