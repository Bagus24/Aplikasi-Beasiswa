<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    protected $table = 'formulir';
    protected $fillable = [
        'id_user', 'nama', 'no_ktp', 'no_hp', 'tempat_lahir', 'tgl_lahir', 'jk', 'agama', 'alamat', 'kec', 'desa', 'nim', 'nama_kampus',
        'fakultas', 'jurusan', 'akre_kampus', 'akre_prodi', 'thn_angkatan', 'ipk', 'no_rek', 'bank', 'nama_rek', 'nama_ayah', 
        'nama_ibu', 'jml_saudara', 'pekerjaan_ibu', 'pekerjaan_ayah', 'foto' 
    ];
}
