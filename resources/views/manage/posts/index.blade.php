@extends('layouts.manage')

@section('content')
	<div class="flex-container">
		
		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">This is a post </h1>
			</div>

			<div class="column">
				<a href="{{route('posts.create')}}" class="button is-primary is-pulled-right">
					Create New Post
				</a>
			</div>
		</div>
@endsection