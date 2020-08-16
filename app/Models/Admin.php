<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];


    // protected $table = 'admins';
    // protected $fillable = ['email',  'password'];
    // protected $hidden = ['password',  'remember_token'];
}
