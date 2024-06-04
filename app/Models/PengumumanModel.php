<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumumanModel extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    protected $primaryKey = 'id_pengumuman';

    protected $fillable = [
        'judul_pengumuman',
        'deskripsi',
        'gambar',
        'tanggal',
        'id_rt',
    ];

    // Define relationship with RT model
    public function rt()
    {
        return $this->belongsTo(RtModel::class, 'id_rt', 'id_rt');
    }
}
