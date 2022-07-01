<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticate;

class User extends Authenticate
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'password',
        'picture',
        'role'
    ];
}
