<?php
// namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
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

    public function specialistCat()
    {
        return $this->hasMany(SpecialistSubCat::class,'doctor_id','doctor_id');
    }
}
