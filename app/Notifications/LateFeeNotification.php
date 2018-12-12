<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class LateFeeNotification extends Notification
{
    use Queueable;

    private $feeAmount;
    private $checkout;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($checkout, $feeAmount)
    {
        $this->feeAmount = $feeAmount;
        $this->checkout = $checkout;
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
        $fee = $this->feeAmount / 100;

        return (new MailMessage)
                    ->line('You have been given a fee of $' . $fee . '.')
                    ->line('This fee is because the equipment you checked out was late.');
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
