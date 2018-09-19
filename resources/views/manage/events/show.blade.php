@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">

			<div class="column is-8">
				<h1 class="title"> {{$event->title}} <small class="m-l-25"></small></h1>

          <p>{{$event->content}}</p>

          <!-- <img src="{!! '/images/events/'.$event->images !!}" alt=""> -->
					<div class="columns is-multiline m-t-10">

							@foreach($images as $image)
							<div class="column is-one-quarter-desktop is-half-tablet">
								<div class="card">
									<div class="card-image">
										<figure class="image is-3by2">
												<img src="{!! '/images/events/'.$image !!}" alt="">
										</figure>
									</div>
								</div>
								</div>
							@endforeach

					</div>

			</div>

			<div class="column is-4 side-card">
        <div class="card ">

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
              <a href="{{route('events.edit', $event->id)}}" class="">
								<span class="icon m-r-10">
									<img src="{{ asset('images/backend/edit.png') }}" alt="link to edit">
								</span>
      				</a>
            </p>

							<form class="card-footer-item"  action="{{ route('events.destroy', $event->id) }}" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="DELETE">
                <a type="submit" class="">
									<span class="icon m-r-10">
										<img src="{{ asset('images/backend/delete.png') }}" alt="link to delete">
									</span>
								</a>
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
