<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [ 'name' => 'admin','guard_name'=>'admin' ],
            [ 'name' => 'doctor','guard_name'=>'admin' ],
            [ 'name' => 'counter','guard_name'=>'admin' ],
        ];
        \Spatie\Permission\Models\Role::insert($roles);
    }
}
