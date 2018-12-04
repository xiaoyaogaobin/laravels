<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResisterNotify extends Notification
{
    use Queueable;

    protected $code;
    protected $type;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($code,$type)
    {
        //

        $this->code =$code;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    public function toMail($notifiable)
    {
        if ($this->type == 'reg'){
            return (new MailMessage)
                ->subject('Mrs gao 注册')
                ->line('感谢您的注册;您的验证码是:'.$this->code);
        }


        return (new MailMessage)
            ->subject('Mrs gao 注册')
            ->line('您的重置验证码是'.$this->code);

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
