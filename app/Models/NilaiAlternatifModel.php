<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NilaiAlternatifModel extends Model
{
    use HasFactory;

    protected $table = 'nilai_alternatif';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_penerima',
        'id_kriteria',
        'id_nilai',
    ];

    public function penerima(): BelongsTo{
        return $this->belongsTo(PenerimaBansosModel::class, 'id_penerima', 'id_penerima');
    }

    public function kriteria(): BelongsTo{
        return $this->belongsTo(KriteriaBansosModel::class, 'id_kriteria', 'id_kriteria');
    }
    public function nilai(): BelongsTo{
        return $this->belongsTo(NilaiKriteriaModel::class, 'id_nilai', 'id_nilai');
    }
}
