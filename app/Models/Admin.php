<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;

    // protected $guard = 'admins';

    protected $table = 'admins';

    protected $fillable = ['email',  'password'];

    protected $hidden = ['password',  'remember_token'];


    // protected $guard = 'admins';
    // protected $guarded = ['id'];
    // protected $hidden = ['password', 'remember_token'];
}
