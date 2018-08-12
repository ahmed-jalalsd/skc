@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Manage Galleries</h1>
			</div>

      <div class="column">
        <a href="{{route('galleries.create')}}" class="button is-primary is-pulled-right">
          <i class="fa fa-user-plus m-r-10"></i> Create New Album
        </a>
      </div>
    </div>

		<hr style="background-color: #ccc; height: 1px" class="m-t-0">

	</div> {{-- end of flex container --}}


@endsection
