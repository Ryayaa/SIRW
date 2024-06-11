<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WargaModel extends Authenticable
{
    use HasFactory;

    protected $table = 'warga';
    protected $primaryKey = 'id_warga';
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat_domisili',
        'pekerjaan',
        'status_perkawinan',
        'roles',
        'password',
        'id_keluarga',
        'username',
        'no_telepon',
        'tempat_lahir',
        'status_hubungan',
        'bukti_ktp',
    ];

    // Relationship dengan tabel kategori_warga
    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(KeluargaModel::class, 'id_keluarga', 'id_keluarga');
    }

    public function penerimas(): HasMany
    {
        return $this->hasMany(PenerimaBansosModel::class, 'id_warga', 'id_warga');
    }

    public function ketuaRt(): HasMany{
        return $this->hasMany(KetuaRtModel::class, 'id_warga', 'id_warga');
    }

    public function rw(): HasMany{
        return $this->hasMany(RwModel::class, 'id_warga', 'id_warga');
    }
}
