<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriWargaModel extends Model
{
    use HasFactory;

    protected $table = 'kategori_warga';
    protected $primaryKey = 'id_kategori_warga';
    protected $fillable = [
        'nama_kategori',
        // Tambahkan field lain jika diperlukan
    ];

    // Relationship dengan tabel warga
    public function wargas()
    {
        return $this->hasMany(WargaModel::class, 'id_kategori_warga', 'id_kategori_warga');
    }
}
