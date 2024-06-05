<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKMModel extends Model
{
    use HasFactory;

    protected $table = 'umkm';
    protected $primaryKey = 'id_umkm';

    protected $fillable = [
        'nama_umkm',
        'alamat',
        'no_telepon',
        'gambar',
        'id_warga',
        'status_pengajuan',
    ];

    public function warga()
    {
        return $this->belongsTo(WargaModel::class, 'id_warga', 'id_warga');
    }
}
