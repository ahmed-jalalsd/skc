@extends('layouts.manage')

@section('content')
  <div class="flex-container">

    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Manage Posts</h1>
      </div>
      <div class="column">
        <a href="{{route('posts.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create New Post</a>
      </div>
    </div>

    <hr class="m-t-0">

    <div class="columns is-multiline">
      @foreach ($posts as $post)
        <div class="column is-one-quarter">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h3 class="title">{{$post->title}}</h3>
                  <p class="subtitle"><em>{{ $post->excerpt }}</em></p>
                </div>

                <nav class="columns is-mobile">

                  <div class="column is-one-half">
                    <a href="{{ route('posts.show', $post->id) }}" class="button is-primary is-fullwidth">Details</a>
                  </div>

                  <div class="column is-one-half">
                    <a href="{{ route('posts.edit', $post->id) }}" class="button is-light is-fullwidth">Edit</a>
                  </div>

                </nav>

              </div>
            </article>
          </div>
        </div>
      @endforeach
      </div>
  </div>
@endsection
