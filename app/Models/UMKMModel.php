<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKMModel extends Model
{
    use HasFactory;

    // Define the table name (if not using Laravel's naming convention)
    protected $table = 'umkm';

    // Specify the primary key
    protected $primaryKey = 'id_umkm';

    // Define the fillable properties
    protected $fillable = [
        'nama_umkm',
        'alamat',
        'no_telepon',
        'gambar',
        'id_warga',
        'status_umkm'
    ];

    // Define the relationship with the Warga model
    public function warga()
    {
        return $this->belongsTo(WargaModel::class, 'id_warga', 'id_warga');
    }
}
