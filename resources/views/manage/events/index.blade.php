@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Manage Events</h1>
			</div>

      <div class="column">
        <a href="{{route('events.create')}}" class="button is-primary is-pulled-right backend-btn">
					<span class="icon m-r-10">
            <img src="{{ asset('images/backend/plus.svg') }}" alt="add a new post icon" style="filter: invert(1);">
          </span>  New Event
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
							<th style="text-align:center;">Actions</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($events as $event)
							<tr>
								<th>{{$event->id}}</th>
								<td>{{$event->title}}</td>
								<td>{{substr($event->excerpt,0,30) }} {{ strlen($event->excerpt) > 30 ? "..." : "" }}</td>
                <td>{{Auth::user()->name}}</td>
								<td>{{$event->created_at->toFormattedDateString()}}</td>
								<td class="action-content">
                  <a href="{{ route('events.show', $event->id) }}" class="m-r-5">
										<span class="icon m-r-10 ">
					            <img src="{{ asset('images/backend/details.png') }}" alt="link to show">
					          </span>
									</a>
									<a href="{{route('events.edit', $event->id)}}" class="">
										<span class="icon m-r-10">
					            <img src="{{ asset('images/backend/edit.png') }}" alt="link to edit">
					          </span>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div> {{-- end of card --}}

		{{$events->links()}}

	</div> {{-- end of flex container --}}


@endsection
