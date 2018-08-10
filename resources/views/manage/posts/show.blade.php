@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">

			<div class="column">
				<h1 class="title"> {{$post->title}} <small class="m-l-25"></h1>
			</div>

			<div class="column">
				<a href="{{route('posts.edit', $post->id)}}" class="button is-primary is-pulled-right">
					<i class="fa fa-user-plus m-r-10"></i>
					Edit Post
				</a>
			</div>

		</div>


		<hr class="m-t-0">



	</div> {{-- end of flex container --}}


@endsection

@section('scripts')

@endsection
