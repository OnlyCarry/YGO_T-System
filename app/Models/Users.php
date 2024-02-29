<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users_system';

    protected $fillable = [
        'nickname',
        'email',
        'name',
        'picture',
        'give_name',
        'family_name',
        'verified_email',
        'id'
    ];
}
