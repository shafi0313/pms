<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = [];

    public function subcategories(){

        return $this->hasMany('App\Models\DoctorSpecialist', 'specialis_id');

    }
}
