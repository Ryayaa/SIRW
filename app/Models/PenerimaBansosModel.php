<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PenerimaBansosModel extends Model
{
    use HasFactory;

    protected $table = 'penerima_bansos';
    protected $primaryKey = 'id_penerima';
    protected $fillable = [
        'id_warga',
        'id_bansos',
        'status',
    ];

    // Relationship dengan tabel rt
    public function warga(): BelongsTo
    {
        return $this->belongsTo(WargaModel::class, 'id_warga', 'id_warga');
    }

    public function bansos(): BelongsTo
    {
        return $this->belongsTo(WargaModel::class, 'id_warga', 'id_warga');
    }

    public function nilaiA(): HasMany{
        return $this->hasMany(NilaiAlternatifModel::class, 'id_penerima', 'id_penerima');
    }

}
