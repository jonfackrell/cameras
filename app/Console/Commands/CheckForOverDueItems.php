<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

use App\Models\Checkout;
use App\Models\User;
use App\Notifications\LateCheckoutsNeedApprovalNotification;

class CheckForOverDueItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkouts:overdue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'If any returned items were overdue and have not been approved, manager is notified.';

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
        $checkouts = Checkout::late()->where('approved_at', NULL)->where('checked_in_at', '!=', NULL)->get();

        $checkouts = $checkouts->filter(function ($value, $key) {
            return $value->isLate();
        });

        if (sizeof($checkouts) > 0) {
            $users = User::where('send_equipment_notice_email', true)->get();
            Notification::send($users, new LateCheckoutsNeedApprovalNotification());
        }
    }
}
