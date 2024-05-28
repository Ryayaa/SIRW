<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestWargaSementaraModel extends Model
{
    use HasFactory;

    protected $table = 'request_warga_sementara';
    protected $primaryKey = 'id_request';
    protected $fillable = [
        'id_warga',
        'bukti_ktp',
        'nik',
        'tanggal_lahir',
        'nama_lengkap',
        'jenis_kelamin',
        'alamat_asal',
        'alamat_domisili',
        'pekerjaan',
        'status_perkawinan',
        'tanggal_masuk',
        'password',
        'status_konfirmasi'
    ];

    // Relasi dengan model Warga
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'id_warga', 'id_warga');
    }
}
