<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    public $timestamps = false;
      protected $fillable = [
        'nama_dokter', 'spesialis', 'nomor_kontak',
        'email'
    ];
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_dokter', 'id_dokter');
    }
}
