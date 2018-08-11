@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">

			<div class="column is-8">
				<h1 class="title"> {{$post->title}} <small class="m-l-25"></small></h1>
				<img src="{{asset('images/blog/'.$post->bk_image)}}" alt="">
          <p>{{$post->content}}</p>
			</div>

			<div class="column is-4">
        <div class="card">

          <div class="card-content">
            <dl class="level">
              <dt class="level-left">Created at:</dt>
              <dd class="level-right"><time datetime="2016-1-1">{{ date('M j, Y H:i', strtotime($post->created_at))}}</time></dd>
            </dl>

            <dl class="level">
              <dt class="level-left">Last Update :</dt>
              <dd class="level-right"><time datetime="2016-1-1">{{ date('M j, Y H:i', strtotime($post->update_at))}}</time></dd>
            </dl>


          </div>

          <footer class="card-footer">
            <p class="card-footer-item">
              <a href="{{route('posts.edit', $post->id)}}" class="button is-primary is-pulled-right">
      					<i class="fa fa-user-plus m-r-10"></i>
      					Edit Post
      				</a>
            </p>


							<!-- <form class="card-footer-item" action="{{ route('posts.destroy', $post->id) }}" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								<a  class="button is-danger is-pulled-right">
	      					<i class="fa fa-user-plus delete is-small m-r-10"></i>
	      					Delete Post
	      				</a>
              </form> -->

							<form class="card-footer-item"  action="{{ route('posts.destroy', $post->id) }}" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="DELETE">
                <button type="submit" class="button is-danger is-pulled-right">
									<i class="fa fa-user-plus delete is-small m-r-10"></i>Delete</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
              </form>

          </footer>
        </div>


			</div>

		</div>
		<hr class="m-t-0">
	</div> {{-- end of flex container --}}


@endsection

@section('scripts')

@endsection
