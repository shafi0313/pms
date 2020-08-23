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
            [ 'name' => 'admin','guard_name'=>'web' ],
            [ 'name' => 'doctor','guard_name'=>'web' ],
            [ 'name' => 'counter','guard_name'=>'web' ],
        ];
        \Spatie\Permission\Models\Role::insert($roles);
    }
}
