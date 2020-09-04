<?php

use App\Models\Medicine;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medicine = [
            ['name'=>'Pac',  'company'=>'The INB SINA'],
            ['name'=>'Prolok',  'company'=>'The INB SINA'],
        ];
        Medicine::insert( $medicine);
    }
}
