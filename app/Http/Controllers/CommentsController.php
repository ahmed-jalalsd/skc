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
    //
  }

  public function addPostComment(Request $request, Post $post)
  {
      $this->validate($request,[
        'body' => 'required'
      ]);

      // $comment = new Comment;
      // $comment->body = $request->body;
      // $comment->user_id = auth()->user()->id;

      // $post->comments()->save($comment);

      $post->addComment($request->body);
      return back();
  }

  /**
   * Store a the comment's replies.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function addReplyComment(Request $request, Comment $comment)
    {
      $this->validate($request,[
        'body' => 'required'
      ]);

      // $reply = new Comment;
      // $reply->body = $request->body;
      // $reply->user_id = auth()->user()->id;
      //
      // $comment->comments()->save($reply);

      $comment->addComment($request->body);

      return back();
    }
}
