<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialistCat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function doctorDegree()
    {
        return $this->belongsTo('App\User','id','doctor_specialist');
    }
}
