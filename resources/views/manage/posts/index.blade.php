@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Manage Posts</h1>
			</div>

      <div class="column">
        <a href="{{route('posts.create')}}" class="button is-primary is-pulled-right">
          <i class="fa fa-user-plus m-r-10"></i> Create New Post
        </a>
      </div>
    </div>

		<hr style="background-color: #ccc; height: 1px" class="m-t-0">

		<div class="card">
			<div class="card-content">
				<table class="table is-narrow is-fullwidth">
					<thead>
						<tr>
							<th>Id</th>
							<th>Title</th>
							<th>Excerpt</th>
							<th>Author</th>
							<th>Date Created</th>
							<th>Actions</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($posts as $post)
							<tr>
								<th>{{$post->id}}</th>
								<td>{{$post->title}}</td>
								<td>{{substr($post->excerpt,0,30) }} {{ strlen($post->excerpt) > 30 ? "..." : "" }}</td>
                <td>{{Auth::user()->name}}</td>
								<td>{{$post->created_at->toFormattedDateString()}}</td>
								<td class="has-text-right">
                  <a href="{{ route('posts.show', $post->id) }}" class="button is-outlined m-r-5">Details</a>
									<a href="{{route('posts.edit', $post->id)}}" class="button is-outlined">Edit</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div> {{-- end of card --}}

		{{$posts->links()}}

	</div> {{-- end of flex container --}}


@endsection
