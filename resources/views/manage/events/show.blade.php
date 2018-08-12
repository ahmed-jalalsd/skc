@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">

			<div class="column is-8">
				<h1 class="title"> {{$event->title}} <small class="m-l-25"></small></h1>

          <p>{{$event->content}}</p>

          <img src="{!! '/images/events/'.$event->images !!}" alt="">
			</div>

			<div class="column is-4">
        <div class="card">

          <div class="card-image">
            <figure class="image is-4by3">
              <img src="{{asset('images/events/'.$event->featured_image)}}" alt="">
            </figure>
          </div>

          <div class="card-content">
            <dl class="level">
              <dt class="level-left">Created at:</dt>
              <dd class="level-right"><time datetime="2016-1-1">{{ date('M j, Y H:i', strtotime($event->created_at))}}</time></dd>
            </dl>

            <dl class="level">
              <dt class="level-left">Last Update :</dt>
              <dd class="level-right"><time datetime="2016-1-1">{{ date('M j, Y H:i', strtotime($event->update_at))}}</time></dd>
            </dl>


          </div>

          <footer class="card-footer">
            <p class="card-footer-item">
              <a href="{{route('posts.edit', $event->id)}}" class="button is-primary is-pulled-right">
      					<i class="fa fa-user-plus m-r-10"></i>
      					Edit Event
      				</a>
            </p>

							<form class="card-footer-item"  action="{{ route('posts.destroy', $event->id) }}" method="POST" enctype="multipart/form-data">
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
