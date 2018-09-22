@extends('layouts.app')

@section('content')

<section class="section single-event single-post">

  <div class="container">

    <h1 class="title single-event__title">Blog</h1>

    <div class="columns">

      <div class="single-event__content is-raised column is-8 is-offset-1">

        <article class="article">
          <header>
            <figure class="image">
              <img src="{{ '/images/blog/'.$post->ft_image }}" alt="article featured image">
            </figure>
          </header>

          <span class="breedcrumbs">
            <h6>{{date('Y', strtotime($post->created_at))}} >> {{$post->title}} </h6>
          </span>

          <div class="article-body">
            <h2 class="title">{{$post->title}}</h2>
            <p>{{$post->content}}</p>
          </div>

          <!-- @isset($images)
            <div class="columns m-t-10 is-multiline is-centered">
              @foreach ($images as $image)
              <div class="column is-4-desktop is-half-tablet">
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
          @endisset -->

          <footer>
            <p>written by <span></span></p>
          </footer>

        </article>

      </div> <!-- end of single raise div -->

      <div class="column is-2 side-bar">
        @include('_partials.nav.archive-side')
      </div> <!-- end of side bar -->

    </div> <!-- end of first columns -->

    <div class="columns">

      <div class="is-raised second-box column is-8 is-offset-1">

      <article class="comments">
        <div class="comments__title">
          <h2>Comments:</h2>
        </div>

        <div class="comments__content">
          <div class="box">
            <article class="media">
              <div class="media-left">
                <figure class="image is-64x64">
                  <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image" class="is-rounded">
                </figure>
              </div>

              <div class="media-content">

                <div class="content">
                  <h3>name</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                  </p>
                </div>

              </div>
            </article>
          </div>

        </div>
      </article>

    </div> <!-- end of second box -->
  </div> <!-- end of second columns -->

    <div class="columns">

      <div class="is-raised third-box column is-8 is-offset-1">

        <div class="comments-form">
          <div class="comments-form__title">
            <h2>Comments</h2>
          </div>

          <form action="{{route('events.store')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="field">
              <label class="label">Name</label>
              <div class="control">
                <input class="input" type="text" placeholder="Text input">
              </div>
            </div>

          <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-danger" type="email" placeholder="Email input" value="hello@">
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <label class="label">your comment</label>
            <div class="control">
              <textarea class="textarea" placeholder="Textarea"></textarea>
            </div>
          </div>


          <div class="field is-grouped">
            <div class="control">
              <button class="button is-primary is-fullwidth skc-btn">Submit</button>
            </div>
          </div>

          </form>

        </div> <!-- end of comments -->

      </div> <!-- end of third box -->

    </div> <!-- end of third columns -->

  </div><!-- end of .container -->

</section>

@endsection
