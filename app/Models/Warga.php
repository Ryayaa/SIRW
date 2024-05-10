<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Warga extends Authenticable
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
        'password',
        'id_keluarga',
    ];

    // Relationship with Keluarga model
    public function keluarga()
    {
        return $this->belongsTo(KeluargaModel::class, 'id_keluarga','id_keluarga');
    }
}
