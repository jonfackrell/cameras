<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class ReportTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDownloadExport()
    {
    	auth()->login(\App\Models\User::make(['email' => 'test@byui.edu']));
    	
    	$startDate = Carbon::now('America/Denver')->subMonth(1)->firstOfMonth()->format('m/d/Y');
        $endDate = Carbon::now('America/Denver')->subMonth(1)->lastOfMonth()->format('m/d/Y');
        $response = $this->call('POST', '/equipment/admin/reports/export', ['range' => $startDate . ' - ' . $endDate]);

        $response
            ->assertOk();
           
    }
}
