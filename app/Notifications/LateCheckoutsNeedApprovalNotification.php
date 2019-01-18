<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Models\Checkout;

class LateCheckoutsNeedApprovalNotification extends Notification
{
    use Queueable;

    public $checkouts;

    /**
     * Create a new notification instance.
     *
     * @param  mixed  $checkouts
     * @return void
     */
    public function __construct($checkouts)
    {
        $this->checkouts = $checkouts;
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

        return (new MailMessage)
                    ->bcc(['fackrellj@byui.edu'])
                    ->line('There is/are ' . $this->checkouts->count() . ' late checkout(s) pending approval.')
                    ->action('View Pending Approval(s)', route('equipment.admin.checkout.approval'));
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
