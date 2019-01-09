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
        $checkouts = Checkout::whereNotNull('checked_in_at')
                                ->whereNull('approved_at')
                                ->whereColumn('due_at', '<', 'checked_in_at')
                                ->get();

        if ($checkouts->count() > 0) {
            $users = User::where('send_equipment_notice_email', true)->get();
            Notification::send($users, new LateCheckoutsNeedApprovalNotification($checkouts));
        }
    }
}
