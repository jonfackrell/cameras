<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

use App\Notifications\LateEquipmentNotification;
use App\Models\Patron;
use App\Models\Checkout;

class SendLateNotice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:lateNotice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Emails a late notice to each Patron containing the equipment they have that is late';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $checkouts = Checkout::late()->where('checked_in_at', NULL)->get();

        $checkouts = $checkouts->filter(function ($value, $key) {
            return $value->isLate();
        });

        $checkoutsByPatron = $checkouts->groupBy('patron_id');
        $patrons = Patron::whereIn('id', $checkoutsByPatron->keys()->all());

        Notification::send($patrons, new LateEquipmentNotification());
    }
}
