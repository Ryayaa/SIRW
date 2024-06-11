<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RwModel extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'rw';
    protected $primaryKey = 'id_rw';
    protected $fillable = [
        'id_warga',
        'status',
        'mulai_jabatan',
        'akhir_jabatan'
    ];

    public function warga(): BelongsTo
    {
        return $this-hasMany(WargaModel::class, 'id_warga', 'id_warga');
    }

}
