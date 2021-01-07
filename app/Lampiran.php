<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    protected $table = 'lampiran';
    protected $fillable = [
        'id_user', 'nama', 'kk', 'ktp', 'km', 'tn', 'rek', 'ttb', 'ak', 'ap', 'bn', 'kak', 'sp', 'pi', 'kkm'
    ];
}
