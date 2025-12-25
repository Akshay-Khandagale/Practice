<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'Clients';

    protected $fillable = [
        'name',
        'email',
        'role',
        'link',
    ];
}
