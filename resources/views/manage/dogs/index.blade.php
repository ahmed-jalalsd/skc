@extends('layouts.manage')

@section('content')
  <div class="flex-container">

    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Manage Dogs</h1>
      </div>
      <div class="column">
        <a href="{{route('dogs.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Add a dog</a>
      </div>
    </div>

    <hr class="m-t-0">

    <div class="columns is-multiline">
      @foreach ($dogs as $dog)
        <div class="column is-one-quarter">
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
				        <p class="title is-4">Dog name: {{$dog->dog_name}}</p>
				      </div>

				    </div>

				    <div class="content">

							<h4 class="subtitle">Breed: {{$dog->breeds->breed}}</h4>
							<h4 class="subtitle">Owner: {{$dog->users->name}}</h4>
				      <time datetime="2016-1-1">{{$dog->created_at}}</time>
				    </div>

						<footer class="card-footer">
						 <a href="{{ route('dogs.show', $dog->id) }}" class=" card-footer-item button is-primary is-fullwidth m-r-10 m-t-5">View</a>
						 <a href="{{ route('dogs.edit', $dog->id) }}" class=" card-footer-item button is-light is-fullwidth m-r-10 m-t-5">Edit</a>

             <form  action="{{ route('dogs.destroy', $dog->id) }}" method="POST" enctype="multipart/form-data">
               <input name="_method" type="hidden" value="DELETE">
               <button type="submit" class="button is-danger is-fullwidth m-t-5">Delete</button>
               <input type="hidden" name="_token" value="{{Session::token()}}">
             </form>

					 </footer>

				  </div>
				</div>


        </div>
      @endforeach
      </div>

			{{$dogs->links()}}
  </div>
@endsection
