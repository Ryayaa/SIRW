<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RtModel extends Model
{
    use HasFactory;

    protected $table = 'rt';
    protected $primaryKey = 'id_rt';
    protected $fillable = [
        'no_rt',
    ];

    public function keluargas(): HasMany{
        return $this->hasMany(KeluargaModel::class, 'id_rt', 'id_rt');
    }

    public function ketuaRt(): HasOne{
        return $this->hasOne(KetuaRtModel::class, 'id_rt', 'id_rt')->where('status', 'aktif');
    }
}
