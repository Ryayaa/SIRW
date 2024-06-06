<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSuratModel extends Model
{
    use HasFactory;

    protected $table = 'jenis_surat_pengantar';
    protected $primaryKey = 'id_jenis_surat';

    protected $fillable = [
        'nama_jenis',
    ];

    // Relasi dengan model SuratPengantar
    public function suratPengantars()
    {
        return $this->hasMany(SuratModel::class, 'id_jenis_surat', 'id_jenis_surat');
    }
}
