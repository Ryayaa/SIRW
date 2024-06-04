<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KriteriaBansosModel extends Model
{
    use HasFactory;

    protected $table = 'kriteria_bansos';
    protected $primaryKey = 'id_kriteria';
    protected $fillable = [
        'id_bansos',
        'nama',
        'bobot',
        'jenis',
    ];

    public function bansos(): BelongsTo{
        return $this->belongsTo(Bansos::class, 'id_bansos', 'id_bansos');
    }
    public function nilaiA(): HasMany{
        return $this->hasMany(NilaiAlternatifModel::class, 'id_kriteria', 'id_kriteria');
    }

    public function subkriteria(): HasMany{
        return $this->hasMany(NilaiKriteriaModel::class, 'id_kriteria', 'id_kriteria');
    }
}
