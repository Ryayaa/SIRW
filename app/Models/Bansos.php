<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bansos extends Model
{
    use HasFactory;

    protected $table = 'bansos';

    protected $primaryKey = 'id_bansos';

    protected $fillable = [
        'nama_bansos', 'deskripsi', 'gambar'
    ];

    public function kriteria(): HasMany{
        return $this->hasMany(KriteriaBansosModel::class, 'id_bansos', 'id_bansos');
    }

    public function penerimas(): HasMany
    {
        return $this->hasMany(PenerimaBansosModel::class, 'id_bansos', 'id_bansos');
    }

    public function nilaiKriteria(): HasMany{
        return $this->hasMany(NilaiKriteriaModel::class, 'id_bansos', 'id_bansos');
    }
}
