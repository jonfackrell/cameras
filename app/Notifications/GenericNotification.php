<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Config;
use App;

class GenericNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $id;
    public $printJob;
    public $subject;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($printJob, $subject = '', $message = '')
    {
        $this->printJob = $printJob;
        $this->subject = $subject;
        $this->message = $message;
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
        $emailSettings = App\Models\EmailSetting::first();

        $conf = [
            'driver' => 'smtp',
            'host' => $emailSettings->outgoing_host,
            'port' => $emailSettings->outgoing_port,
            'from' => [
                'address' => $emailSettings->from_address,
                'name' => $emailSettings->from_name,
            ],
            'encryption' => $emailSettings->encryption,
            'username' => $emailSettings->username,
            'password' => $emailSettings->password,
            'sendmail' => '/usr/sbin/sendmail -bs',
            'pretend' => false,
        ];

        Config::set('mail', $conf);

        $app = App\::getInstance();
        $app->register('Illuminate\Mail\MailServiceProvider');

        return (new MailMessage)
                    ->subject($this->subject)
                    ->line($this->message)
                    ->action('View', url('/history/'. $this->printJob->id));
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
