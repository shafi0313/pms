<?php

use App\Models\MyRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MyRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name'=>'Admin', 'slug'=>'admin'],
            ['name'=>'Doctor', 'slug'=>'doctor'],
        ];

        MyRole::insert($roles);
    }
}
