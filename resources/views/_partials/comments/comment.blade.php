@foreach($comments as $comment)
<div class="display-replay">

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
</div>
@endforeach
