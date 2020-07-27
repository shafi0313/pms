<?php

use App\Models\Admin;
use Carbon\Carbon;
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
        {
            $now = Carbon::now();
            $admin_info = [
                [
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'age' => '25',
                    'photo' => '',
                    'address' => '',
                    'role' => '1',
                    'email_verified_at' => $now,
                    'password' => bcrypt('shafi123'),
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Admin',
                    'email' => 's@s',
                    'age' => '25',
                    'photo' => '',
                    'address' => '',
                    'role' => '1',
                    'email_verified_at' => $now,
                    'password' => bcrypt('1'),
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            ];
            Admin::insert($admin_info);
        }
    }
}
