@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Upcoming Events</h1>
			</div>

      <div class="column">
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
							<th>Date</th>
							<th style="text-align:center;">Actions</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($events as $event)
							<tr>
								<th>{{$event->id}}</th>
								<td>{{$event->title}}</td>
								<td>{{$event->created_at->toFormattedDateString()}}</td>
								<td class="action-content">
									@if($event->flag_application == 1)
										<a href="{{route('apply.event', $event->id)}}" title="Submit your dog to the event" class="button is-primary backend-btn">
	                    apply
										</a>
									@else
										<a href="{{route('apply.event', $event->id)}}" disabled title="Submit your dog to the event" class="button is-primary backend-btn">
											apply
										</a>
									@endif
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
