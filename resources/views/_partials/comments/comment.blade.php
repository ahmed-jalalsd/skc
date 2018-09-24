@foreach($comments as $comment)
<!-- <div class="display-replay"> -->

  <article class="media display-replay">
    <div class="media-left">
      <figure class="image is-32x32">
        <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image" class="is-rounded">
      </figure>
    </div>

    <div class="content">
      <h3><strong>{{$comment->user->name }}</strong></h3>
      <p>{{$comment->body}}</p>

      <a href="" id="reply"></a>

      <form method="post" action="{{ route('reply.add') }}">
          {{ csrf_field() }}
          <div class="form-group">
              <input type="text" name="comment_body" class="form-control" />
              <input type="hidden" name="post_id" value="{{ $post_id }}" />
              <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-warning" value="Reply" />
          </div>
      </form>
      @include('_partials.comments.comment', ['comments' => $comment->replies])
    </div>
  </article>
<!-- </div> -->
@endforeach
