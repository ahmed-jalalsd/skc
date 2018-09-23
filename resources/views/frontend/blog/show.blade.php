@extends('layouts.app')
<style>
    .display-replay .display-replay {
        margin-left: 40px
    }
</style>
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

                @include('_partials.comments.comment', ['comments' => $post->comments, 'post_id' => $post->id])

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


          <form action="{{ route('comment.add') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

          <div class="field">
            <label class="label">your comment</label>
            <div class="control">
              <textarea class="textarea" name="comment_body" ></textarea>
              <input type="hidden" name="post_id" value="{{ $post->id }}" />
            </div>
          </div>


          <div class="field is-grouped is-algined-right">
            <div class="control">
              <button class="button is-fullwidth skc-btn">Submit</button>
            </div>
          </div>

          </form>

        </div> <!-- end of comments -->

      </div> <!-- end of third box -->

    </div> <!-- end of third columns -->

  </div><!-- end of .container -->

</section>
@endsection
