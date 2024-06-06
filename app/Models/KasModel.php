<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasModel extends Model
{
    use HasFactory;

    protected $table = 'kas';

    protected $primaryKey = 'id_kas';

    protected $fillable = [
        'jumlah',
        'jumlah_masuk',
        'jumlah_keluar',
        'tanggal',
        'id_rt',
        'keterangan'
    ];

    public function rt()
    {
        return $this->belongsTo(RtModel::class, 'id_rt', 'id_rt');
    }
}
