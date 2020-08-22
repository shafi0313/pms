<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name'=>'admin', 'guard_name'=>'admin'],
            ['name'=>'doctor', 'guard_name'=>'admin'],
            ['name'=>'counter', 'guard_name'=>'admin'],
        ];
        \Spatie\Permission\Models\Permission::insert($permissions);
    }
}
