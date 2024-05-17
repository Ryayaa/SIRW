<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RTModel extends Model
{
    use HasFactory;

    protected $table = 'rt';
    protected $primaryKey = 'id_rt';
    protected $fillable = [
        'no_rt',
        'nama_lengkap',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'status',
        'mulai_jabatan',
        'akhir_jabatan'
    ];

    public function keluargas(): HasMany{
        return $this->hasMany(KeluargaModel::class, 'id_keluarga', 'id_keluarga');
    }

    // Relationship dengan tabel rw
    public function rw()
    {
        return $this->belongsTo(RwModel::class, 'id_rw', 'id_rw');
    }
}
