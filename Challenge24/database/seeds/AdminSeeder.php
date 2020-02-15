<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $check = \DB::table('users')->where('role', 'admin')->count();
        if (empty($check)) {
            \DB::table('users')->insert(
                [
                    'name' => 'admin',
                    'email' => 'admin@admin',
                    'role' => 'admin',
                    'password' => \Hash::make('admin'),
                ]
            );
        }
    }
}
