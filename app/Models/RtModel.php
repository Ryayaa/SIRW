<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RtModel extends Model
{
    use HasFactory;

    protected $table = 'rt';
    protected $primaryKey = 'id_rt';
    protected $fillable = [
        'no_rt',
        'username',
        'password',
        'nama_lengkap',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'id_rw',
    ];

    // Relationship dengan tabel rw
    // public function rw()
    // {
    //     return $this->belongsTo(RwModel::class, 'id_rw', 'id_rw');
    // }
}
