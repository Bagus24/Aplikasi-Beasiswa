<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    protected $guard = 'mahasiswa';
    protected $table = 'mahasiswa';
    protected $fillable = [
        'nama', 'email', 'password', 'beasiswa'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
