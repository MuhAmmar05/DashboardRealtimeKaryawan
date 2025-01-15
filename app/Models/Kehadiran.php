<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kehadiran extends Model
{
    protected $table = 'ess_trkehadiran';
    protected $primaryKey = 'khd_id';
    public $timestamps = false;

    protected $fillable = [
        'kry_id',
        'khd_log_masuk',
        'khd_log_keluar',
        'khd_status_kehadiran',
        'khd_keterangan_kehadiran',
        'khd_catatan',
        'kry_created_by',
        'kry_created_date',
        'kry_modif_by',
        'kry_modif_date',
    ];

    // Relasi ke tabel ess_mskaryawan
    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'kry_id');
    }
}
