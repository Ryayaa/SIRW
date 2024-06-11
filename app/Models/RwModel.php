<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RwModel extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'rw';
    protected $primaryKey = 'id_rw';
    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'status',
        'mulai_jabatan',
        'akhir_jabatan'
    ];

    public function rws(): HasMany
    {
        return $this->hasMany(RtModel::class, 'id_rw', 'id_rw');
    }

}
