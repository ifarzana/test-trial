<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Venturecraft\Revisionable\RevisionableTrait;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'company', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
