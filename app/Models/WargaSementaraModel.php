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
        'nama_lengkap',
        'jenis_kelamin',
        'alamat_asal',
        'alamat_domisili',
        'pekerjaan',
        'status_perkawinan',
        'tanggal_masuk',
        'password'
    ];
    protected $hidden = [
        'password',
    ];
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_masuk' => 'date',
    ];
}
