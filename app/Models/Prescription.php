<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo('App\User','doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function medicines()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }

    public function Specialist()
    {
        return $this->belongsTo(DoctorSpecialist::class,'doctor_id','doctor_id');
    }

    public function prescriptionInfo()
    {
        return $this->belongsTo(PrescriptionInfo::class,'apnmt_id','apnmt_id');
    }

    // public function patient_test()
    // {
    //     return $this->belongsTo(PatientTest::class,'id')->using(MedicalTest::class,'test_id');
    //     // $this->belongsTo(PatientTest::class,)
    // }
}
