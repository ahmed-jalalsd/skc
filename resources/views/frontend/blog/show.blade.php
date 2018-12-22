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

          <footer >
            <p>written by <span>{{$post->users->name}}</span></p>
          </footer>

        </article>

      </div> <!-- end of single raise div -->

      <div class="column is-2 side-bar">
        @include('_partials.nav.archive-side', ['url1' => 'blog'])
      </div> <!-- end of side bar -->

    </div> <!-- end of first columns -->

    <div class="columns">

      <div class="is-raised second-box column is-8 is-offset-1">

      <article class="comments">
        <div class="comments__title">
          <h2>Comments:</h2>
        </div>

        <div class="comments__content">

          @foreach ($post->comments as $comment)

            <div class="box">
              <article class="media">
                <div class="media-left">
                  <figure class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image" class="is-rounded">
                  </figure>
                </div>

                <div class="media-content">
                  <h3><strong>{{$comment->user->name }}</strong></h3>
                  <p>{{$comment->body}}</p>
                </div>
              </article>

            </div>

            <!--  replay to comment -->
            @foreach ($comment->comments as $reply)
              <div class="box reply-box">
                <article class="media">
                  <div class="media-left">
                    <figure class="image is-64x64">
                      <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image" class="is-rounded">
                    </figure>
                  </div>

                  <div class="media-content">
                    <h3><strong>{{$reply->user->name }}</strong></h3>
                    <p>{{$reply->body}}</p>
                  </div>
                </article>
              </div>
              @endforeach
              <!-- end of reply loop  -->
              <!-- reply form -->
              <button class="button is-small is-outlined" onclick="toggleReply('{{$comment->id}}')">
                <span class="icon">
                  <i class="fas fa-reply"></i>
                </span>
                <span>Reply</span>
              </button>

              <div class="reply-form-{{$comment->id}} is-hidden m-t-10">
                <form action="{{ route('reply.add', $comment->id) }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="field">
                    <div class="control">
                      <!-- <input class="input" type="text" name="body"> -->
                      <textarea class="textarea" name='body' rows="3"></textarea>
                    </div>
                  </div>


                  <div class="field is-grouped is-algined-right">
                    <div class="control">
                      <button class="button is-fullwidth skc-btn">Submit</button>
                    </div>
                  </div>

                </form>
              </div>
              <!-- end of reply form -->

          @endforeach

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


          <form action="{{ route('comment.add', $post->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

          <div class="field">
            <label class="label">your comment</label>
            <div class="control">
              <textarea class="textarea" name="body" ></textarea>
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

@section('scripts')
  <script>
    function toggleReply(commentId) {
      $('.reply-form-'+commentId).toggleClass('is-hidden');
    }
  </script>
@endsection
