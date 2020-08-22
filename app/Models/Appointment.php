<?php
// namespace App;
namespace App\Models;


use Carbon\Carbon;
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

}
