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
            ['name'=>'Pac', 'mg'=>'', 'type'=>'Tablet', 'medicine_group'=>'Paracetamol + Caffeine',  'company'=>'Ibn-Sina Pharmaceuticals Ltd.', 'price'=>'2.49'],
            ['name'=>'Prolok', 'mg'=>'20mg', 'type'=>'Capsule', 'medicine_group'=>'Omeprazol', 'company'=>'Ibn-Sina Pharmaceuticals Ltd.', 'price'=>'5'],
            ['name'=>'Abex', 'mg'=>'(30 mg+100 mg+1.25 mg)/5 ml', 'type'=>'Syrup', 'medicine_group'=>'Pseudoephedrine + Guaiphenasine + Triprolidine', 'company'=>'Ibn-Sina Pharmaceuticals Ltd.', 'price'=>''],
            [
                'name'=>'',
                'mg'=>'',
                'type'=>'',
                'medicine_group'=>'',
                'company'=>'Ibn-Sina Pharmaceuticals Ltd.',
                'price'=>''
            ],
            // [
            //     'name'=>'',
            //     'mg'=>'',
            //     'type'=>'',
            //     'medicine_group'=>'',
            //     'company'=>'Ibn-Sina Pharmaceuticals Ltd.',
            //     'price'=>''
            // ],

        ];
        Medicine::insert( $medicine);
    }
}
