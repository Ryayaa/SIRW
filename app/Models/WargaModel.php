<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WargaModel extends Model
{
    use HasFactory;

    protected $table = 'warga';
    protected $primaryKey = 'id_warga';
    protected $fillable = [
        'NKK',
        'NIK',
        'nama_lengkap',
        'jenis_kelamin',
        'alamat',
        'pekerjaan',
        'status_perkawinan',
        'password',
        'id_rt',
        'id_kategori_warga',
    ];

    // Relationship dengan tabel rt
    public function rt()
    {
        return $this->belongsTo(RtModel::class, 'id_rt', 'id_rt');
    }

    // Relationship dengan tabel kategori_warga
    public function kategoriWarga()
    {
        return $this->belongsTo(KategoriWargaModel::class, 'id_kategori_warga', 'id_kategori_warga');
    }

    public function penerimas(): HasMany
    {
        return $this->hasMany(PenerimaBansosModel::class, 'id_warga', 'id_warga');
    }
}
