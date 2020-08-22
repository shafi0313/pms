<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable, HasRoles;

    // protected $guarded = [];

    protected $guard = ['admin'];


    protected $table = 'admins';
    protected $fillable = ['email',  'password'];
    protected $hidden = ['password',  'remember_token'];
}
