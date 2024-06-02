<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NilaiKriteriaModel extends Model
{
    use HasFactory;

    protected $table = 'nilai_kriteria';
    protected $primaryKey = 'id_nilai';
    protected $fillable = [
        'id_kriteria',
        'subkriteria',
        'nilai',
    ];

    public function kriteria(): BelongsTo{
        return $this->belongsTo(KriteriaBansosModel::class, 'id_kriteria', 'id_kriteria');
    }

    public function nilaiA(): HasMany{
        return $this->hasMany(NilaiAlternatifModel::class, 'id_nilai', 'id_nilai');
    }

    public function bansos(): BelongsTo{
        return $this->belongsTo(Bansos::class, 'id_bansos', 'id_bansos');
    }
}
