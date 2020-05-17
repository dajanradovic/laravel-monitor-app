<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'admin',
            'email' => 'admin@company.com',
            'department' => 'Supervisor',
            'password' => Hash::make('password'),
            'created_at'=>Carbon::now()
        ]);
    }
}
