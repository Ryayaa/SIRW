<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaSementaraModel extends Model
{
    use HasFactory;

    protected $table = 'warga_sementara';
    protected $primaryKey = 'id_warga_sementara';
    protected $fillable = [
        'bukti_ktp',
        'nik',
        'tanggal_lahir',
        'tempat_lahir',
        'nama_lengkap',
        'jenis_kelamin',
        'alamat_domisili',
        'pekerjaan',
        'status_perkawinan',
        'agama',
        'no_telepon',
        'pengaju',
    ];
}
