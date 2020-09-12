<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrescriptionInfo extends Model
{
    protected $guarded = [];

    public function patient_test()
    {
        return $this->belongsToMany(PatientTest::class,'test_id')->using(MedicalTest::class,'id');
        // $this->belongsTo(PatientTest::class,)
    }
}
