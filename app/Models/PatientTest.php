<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientTest extends Model
{
    protected $guarded = [];

    public function medicalTest()
    {
       return  $this->belongsTo(MedicalTest::class,'medical_test_id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\User','doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }



}
