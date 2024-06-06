<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratModel extends Model
{
    protected $table = 'surat_pengantar';
    protected $primaryKey = 'id_surat_pengantar';

    protected $fillable = [
        'tanggal',
        'keterangan',
        'id_warga',
        'id_jenis_surat',
    ];

    // Relasi dengan model WargaModel
    public function warga()
    {
        return $this->belongsTo(WargaModel::class, 'id_warga', 'id_warga');
    }

    // Relasi dengan model JenisSuratPengantarModel
    public function jenisSurat()
    {
        return $this->belongsTo(JenisSuratModel::class, 'id_jenis_surat', 'id_jenis_surat');
    }
}
