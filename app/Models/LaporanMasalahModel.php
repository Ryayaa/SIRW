<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMasalahModel extends Model
{
    use HasFactory;

    protected $table = 'laporan_masalah';
    protected $primaryKey = 'id_laporan_masalah';

    protected $fillable = [
        'judul_laporan',
        'deskripsi',
        'tanggal_laporan',
        'gambar',
        'status_hide',
        'id_warga',
        'status_pengajuan',
    ];

    public function warga()
    {
        return $this->belongsTo(WargaModel::class, 'id_warga', 'id_warga');
    }
}
