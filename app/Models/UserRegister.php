<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserRegister extends Authenticatable
{
    //
    use HasApiTokens, Notifiable;
    protected $table = 'users_register';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = ['password', 'remember_token'];
}