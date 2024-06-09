<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KeluargaModel extends Model
{
    use HasFactory;

    protected $table = 'keluarga';
    protected $primaryKey = 'id_keluarga';
    protected $fillable = [
        'nomor_kk',
        'alamat',
        'id_rt',
    ];

    public function rt(): BelongsTo{
        return $this->belongsTo(RtModel::class, 'id_rt', 'id_rt');
    }

    public function warga(): HasMany{
        return $this->hasMany(WargaModel::class, 'id_keluarga', 'id_keluarga');
    }
}
