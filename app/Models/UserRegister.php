<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class UserRegister extends Model
{
    //
    use HasApiTokens;  // येथे HasApiTokens जोडा
    protected $table = 'users_register';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
}
