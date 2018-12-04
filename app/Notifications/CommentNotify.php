<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommentNotify extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    //
    protected  $comments;

    public function __construct($comments)
    {
        //
        $this->comments = $comments;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     * 'user_id'=>$this->comment->user->id,//谁发表的评论
    'user_icon'=>$this->comment->user->icon,//发表评论的用户头像
    'user_name'=>$this->comment->user->name,
    'article_id'=>$this->comment->article->id,
    'article_title'=>$this->comment->article->title,
     */
    public function toArray($notifiable)
    {
        return [
            //
            'user_id'=>$this->comments->user->id,//谁发表的评论
            'user_icon'=>$this->comments->user->icon,//发表评论的用户头像
            'user_name'=>$this->comments->user->name,
            'article_id'=>$this->comments->article->id,
            'article_title'=>$this->comments->article->title,
            'link' =>route('article.article.show',$this->comments->article).'#comment'.$this->comments->id,

        ];
    }
}
