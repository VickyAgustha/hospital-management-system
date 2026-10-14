<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table = 'poli';
    protected $primaryKey = 'id_poli';
    public $timestamps = false; // Jika tabel tidak ada created_at/updated_at
    protected $fillable = ['nama_poli'];
}
