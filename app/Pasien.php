<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = [
        'no_rm', 'nama_pasien', 'alamat', 'no_telp',
        'gender', 'tempat_lahir', 'tgl_lahir',
        'contact_person', 'status_cp'
    ];
}
