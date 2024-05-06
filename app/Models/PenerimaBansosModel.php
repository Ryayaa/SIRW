<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenerimaBansosModel extends Model
{
    use HasFactory;

    protected $table = 'penerima_bansos';
    protected $primaryKey = 'id_penerima_bansos';
    protected $fillable = ['id_warga'];

    // Relationship dengan tabel rt
    public function warga(): BelongsTo
    {
        return $this->belongsTo(WargaModel::class, 'id_warga', 'id_warga');
    }

}
