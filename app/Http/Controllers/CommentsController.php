<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $comment = new Comment;
      $comment->body = $request->get('comment_body');
      $comment->user()->associate($request->user());
      $post = Post::find($request->get('post_id'));
      $post->comments()->save($comment);

      return back();
  }

  /**
   * Store a the comment's replies.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function replyStore(Request $request)
    {
      $reply = new Comment();
      $reply->body = $request->get('comment_body');
      $reply->user()->associate($request->user());
      $reply->parent_id = $request->get('comment_id');
      $post = Post::find($request->get('post_id'));

      $post->comments()->save($reply);

      return back();
    }
}
