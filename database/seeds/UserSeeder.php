<?php

use Illuminate\Database\Seeder;

use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'role_id' => '0',
                'name' => 'User',
                'email' => 'user@s',
                'name' => bcrypt('12345678'),
            ],
            [
                'role_id' => '1',
                'name' => 'Admin',
                'email' => 'admin@s',
                'name' => bcrypt('12345678'),
            ],
            [
                'role_id' => '2',
                'name' => 'Doctor',
                'email' => 'doctor@s',
                'name' => bcrypt('12345678'),
            ],
        ];
        User::insert($users);
    }
}
