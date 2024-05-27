<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanModel extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_warga';
    protected $primaryKey = 'id_kegiatan_warga';

    protected $fillable = [
        'nama_kegiatan',
        'deskripsi',
        'lokasi',
        'tanggal',
        'waktu',
        'id_rt',
    ];

    public function rt()
    {
        return $this->belongsTo(RTModel::class, 'id_rt', 'id_rt');
    }
}
