@extends('layouts.manage')

@section('content')
  <div class="flex-container">

    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Manage Dogs</h1>
      </div>
      <div class="column">
        <a href="{{route('dogs.create')}}" class="button is-primary is-pulled-right backend-btn">
          <span class="icon m-r-10">
            <img src="{{ asset('images/backend/plus.svg') }}" alt="add a new post icon" style="filter: invert(1);">
          </span> New dog</a>
      </div>
    </div>

    <hr class="m-t-0">

    <div class="columns is-multiline">
      @foreach ($dogs as $dog)
        <div class="column is-one-quarter gallery-card">
          <?php $images= json_decode($dog->dog_images); ?>

					<div class="card">

						<div class="card-image">
							<figure class="image is-4by3">
								<img src="{!! '/images/dogs/'.$images[0] !!}"  alt="">
    					</figure>
						</div>

  					<div class="card-content">

              <div class="media">

                <div class="media-content">
                  <h4 class="title is-4">Name: {{$dog->dog_name}}</h4>
                  <h4 class="subtitle">Breed: {{$dog->breeds->breed}}</h4>
    							<h4 class="subtitle">Owner: {{$dog->users->name}}</h4>

                  <div class="content">
      				      <time datetime="2016-1-1">{{$dog->created_at}}</time>
      				    </div>

                  <nav class="columns is-mobile">

                    <div class="column is-one-half">
          						 <a href="{{ route('dogs.show', $dog->id) }}" class="m-r-10 m-t-5">
                         <span class="icon m-r-10">
                           <img src="{{ asset('images/backend/details.png') }}" alt="link to show">
                         </span>
                       </a>
                     </div>

                     <div class="column is-one-half">
          						 <a href="{{ route('dogs.edit', $dog->id) }}" class="m-r-10 m-t-5">
                         <span class="icon m-r-10">
                           <img src="{{ asset('images/backend/edit.png') }}" alt="link to edit">
                         </span>
                       </a>
                     </div>

                     <div class="column is-one-half">
                       <form  action="{{ route('dogs.destroy', $dog->id) }}" method="POST" enctype="multipart/form-data">
                         <input name="_method" type="hidden" value="DELETE">
                         <button class="button" style="border:none;width: 100%;padding: 0;">
                           <span class="icon">
                             <img src="{{ asset('images/backend/delete.png') }}" alt="link to edit">
                           </span>
                         </button>
                         <input type="hidden" name="_token" value="{{Session::token()}}">
                       </form>
                   </div>

      					 </nav>

				        </div>

    				  </div>
            </div>
  				</div>


        </div>
      @endforeach
      </div>
			{{$dogs->links()}}
  </div>
@endsection
