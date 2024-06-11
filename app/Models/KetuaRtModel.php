<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KetuaRtModel extends Model
{
    use HasFactory;

    protected $table = 'ketua_rt';
    protected $primaryKey = 'id_ketua_rt';
    protected $fillable = [
        'id_rt',
        'id_warga',
        'status',
        'mulai_jabatan',
        'akhir_jabatan'
    ];

    public function rt(): BelongsTo{
        return $this->belongsTo(RtModel::class, 'id_rt', 'id_rt');
    }
    public function warga(): BelongsTo{
        return $this->belongsTo(WargaModel::class, 'id_warga', 'id_warga');
    }

}
