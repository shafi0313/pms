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
            ['name'=>'admin', 'guard_name'=>'web'],
            ['name'=>'doctor', 'guard_name'=>'web'],
            ['name'=>'counter', 'guard_name'=>'web'],
        ];
        \Spatie\Permission\Models\Permission::insert($permissions);
    }
}
