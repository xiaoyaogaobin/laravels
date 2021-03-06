<?php

namespace App\Observers;

use App\Models\Comments;
use App\Notifications\CommentNotify;

class CommentObserver
{
    /**
     * Handle the comments "created" event.
     *
     * @param  \App\Models\Comments  $comments
     * @return void
     */
    public function created(Comments $comments)
    {
        //
//        dd($comments);
        if ($comments->article->user->id !== auth()->id()){

            $comments->article->user->notify(new CommentNotify($comments));
        }


    }

    /**
     * Handle the comments "updated" event.
     *
     * @param  \App\Models\Comments  $comments
     * @return void
     */
    public function updated(Comments $comments)
    {
        //
    }

    /**
     * Handle the comments "deleted" event.
     *
     * @param  \App\Models\Comments  $comments
     * @return void
     */
    public function deleted(Comments $comments)
    {
        //
    }

    /**
     * Handle the comments "restored" event.
     *
     * @param  \App\Models\Comments  $comments
     * @return void
     */
    public function restored(Comments $comments)
    {
        //
    }

    /**
     * Handle the comments "force deleted" event.
     *
     * @param  \App\Models\Comments  $comments
     * @return void
     */
    public function forceDeleted(Comments $comments)
    {
        //
    }
}
