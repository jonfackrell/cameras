<?php

namespace App\Console\Commands;

use App\Models\Checkout;
use App\Models\Patron;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DueEquipmentNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendDueNotice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:dueNotice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Emails a late notice to each Patron containing the equipment they have that is due';

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
        $checkouts = Checkout::whereNull('checked_in_at')
                                ->whereDate('due_at', Carbon::now()->toDateString())
                                ->get();

        $checkoutsByPatron = $checkouts->groupBy('patron_id');

        $patrons = Patron::whereIn('id', $checkoutsByPatron->keys()->all())->get();

        Notification::send($patrons, new DueEquipmentNotification());
    }
}
