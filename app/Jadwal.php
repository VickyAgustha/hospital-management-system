<?php
// app/Models/Jadwal.php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal'; // atau nama tabel kamu
     protected $primaryKey = 'id_jadwal';
     public $timestamps = false;  
    protected $fillable = [
        'hari', 'jam_masuk', 'jam_keluar', 'id_dokter'
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }
}
