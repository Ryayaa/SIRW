<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackLaporanModel extends Model
{
    use HasFactory;
    protected $table = 'feedback_laporan_masalah';
    protected $primaryKey = 'id_feedback';

    protected $fillable = [
        'feedback',
        'gambar',
    ];

    // Relasi dengan model SuratPengantar
    public function suratPengantars()
    {
        return $this->belongsTo(LaporanMasalahModel::class, 'id_laporan_masalah', 'id_laporan_masalah');
    }
}
