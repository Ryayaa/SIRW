<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga';

    protected $primaryKey = 'id_keluarga';

    protected $fillable = [
        'nomor_kk',
        'alamat',
        'id_rt',
    ];

    // Relationship with RT model
    public function rt()
    {
        return $this->belongsTo(RTModel::class, 'id_rt');
    }

    // Relationship with Warga model
    public function wargas()
    {
        return $this->hasMany(Warga::class, 'id_keluarga');
    }
}
