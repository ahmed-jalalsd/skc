@extends('layouts.manage')

@section('content')





	<div class="flex-container">

		<div class="content is-medium">
		  <h1 class="title">{{ $gallery->title }}</h1>
		  <p class="subtitle"> Created at : <small> <time datetime="2016-1-1">{{ date('M j, Y ', strtotime($gallery->created_at))}}</time> </small></p>
		</div>
		<div class="columns m-t-10 is-multiline">

			@foreach($gallery->photos as $arrOfItem)
					<div class="column is-one-quarter-desktop is-half-tablet">

						<div class="card">

								<div class="card-image">

			            	<figure class="image is-3by2">
												<img src="{!! '/images/gallery/photos/'.$arrOfItem->images !!}" alt="">
			            	</figure>

			            	<!-- <div class="card-content is-overlay is-clipped">
			              	<span class="tag is-info">
			                	Photo Title That is really long to show the clipping
			              	</span>
			            	</div> -->

			        	</div>

								<!-- <footer class="card-footer">
			            <a class="card-footer-item">
			              BUY
			            </a>
			        	</footer> -->

			    		</div>
    			</div>
@endforeach

		<hr style="background-color: #ccc; height: 1px" class="m-t-0">

	</div> {{-- end of flex container --}}


@endsection
