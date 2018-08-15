@extends('layouts.manage')

@section('content')
  <div class="flex-container">

    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Manage Galleries</h1>
      </div>
      <div class="column">
        <a href="{{route('galleries.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create New Gallery</a>
      </div>
    </div>

    <hr class="m-t-0">

    <div class="columns is-multiline">
      @foreach ($galleries as $gallery)
        <div class="column is-one-quarter">


					<div class="card">

						<div class="card-image">
							<figure class="image is-4by3">
								<img src="{{'/images/gallery/'.$gallery->cover_image}}" alt="{{$gallery->title}}">
    					</figure>
						</div>

  					<div class="card-content">
							<div class="media">

							<div class="media-content">
				        <p class="title is-4">{{$gallery->title}}</p>

								<nav class="columns is-mobile">

                  <div class="column is-one-half">
                    <a href="{{ route('galleries.show', $gallery->id) }}" class="button is-primary is-fullwidth">View</a>
                  </div>

                  <div class="column is-one-half">
                    <a href="{{ route('galleries.edit', $gallery->id) }}" class="button is-light is-fullwidth">Edit</a>
                  </div>

                </nav>

				      </div>

				    </div>

				    <div class="content">
              <div class="column is-one-half">

                <form  action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                  <input name="_method" type="hidden" value="DELETE">
                  <button type="submit" class="button is-fullwidth  is-danger ">
                    <i class="fa fa-user-plus delete is-small m-r-10"></i>Delete</button>
                  <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>

              </div>
				      <time datetime="2016-1-1">{{$gallery->created_at}}</time>
				    </div>

				  </div>
				</div>


        </div>
      @endforeach
      </div>

			{{$galleries->links()}}
  </div>
@endsection
