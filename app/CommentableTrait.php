<?php
/**
 * Created do DRY the CommentsController and Comment and Post models
 */
namespace App;
trait CommentableTrait
{
    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable')->latest();
    }
    public function addComment($body)
    {
        $comment=new Comment();
        $comment->body=$body;
        $comment->user_id=auth()->user()->id;
        $this->comments()->save($comment);
        return $comment;
    }
}
