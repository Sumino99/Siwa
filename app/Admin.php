<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'superuser';

    protected $fillable = [
    	'nama',
    	'username',
    	'password'
    ];

    protected $hidden = ['password'];

    public $timestamps = false;
}
