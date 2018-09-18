<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$users = factory(App\User::class, 10)->create();
        $patrons = factory(App\Patron::class, 100)->create();
        $equipment = factory(App\Equipment::class, 100)->create();
        $checkouts = factory(App\Checkout::class, 20)->create();
    }
}
