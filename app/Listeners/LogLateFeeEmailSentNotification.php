<?php

namespace App\Listeners;

use App\Models\EquipmentNotification;
use App\Notifications\DueEquipmentNotification;
use App\Notifications\LateEquipmentNotification;
use App\Notifications\LateFeeNotification;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogLateFeeEmailSentNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NotificationSent  $event
     * @return void
     */
    public function handle(NotificationSent $event)
    {
        $subject = null;
        $message = null;

        switch(get_class($event->notification)){

            case 'App\Notifications\LateFeeNotification':
                $subject = 'Late Fee Notification';
                $message = (new LateFeeNotification($event->notification->checkout))->toMail($event->notifiable);
                break;

            case 'App\Notifications\DueEquipmentNotification':
                $subject = 'Equipment Due Notification';
                $message = (new DueEquipmentNotification())->toMail($event->notifiable);
                break;

            case 'App\Notifications\LateEquipmentNotification':
                $subject = 'Late Equipment Notification';
                $message = (new LateEquipmentNotification())->toMail($event->notifiable);
                break;

        }

        if(!is_null($subject) && !is_null($message)){

            $markdown = new \Illuminate\Mail\Markdown(view(), [
                'theme' => 'default',

                'paths' => [
                    resource_path('views/vendor/mail'),
                ], ]);

            EquipmentNotification::create([
                'patron_id' => $event->notifiable->id,
                'email' => $event->notifiable->email,
                'checkout_id' => ((isset($event->notification->checkout))?$event->notification->checkout->id:null),
                'subject' => $subject,
                'body' => $markdown->render('vendor.notifications.email', $message->toArray()),
            ]);

        }

    }
}
