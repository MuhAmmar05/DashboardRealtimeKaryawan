<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Karyawan extends Model
{
    protected $table = 'ess_mskaryawan';
    protected $primaryKey = 'kry_id';
    public $incrementing = false; // Karena kry_id bukan auto increment
    public $timestamps = false;

    protected $fillable = [
        'kry_nama_depan',
        'kry_nama_blkg',
        'kry_username',
        'kry_tgl_lahir',
        'kry_jenis_kelamin',
        'jab_main_id',
        'jab_sec_id',
        'gol_id',
        'kry_tgl_masuk_kerja',
        'kry_status',
        'kry_created_by',
        'kry_created_date',
        'kry_modif_by',
        'kry_modif_date',
    ];

    public function scopeFilter($query, $filters)
    {
        return $query
            ->when($filters['keyword'] ?? null, function ($query, $keyword) {
                $query->where(function ($subQuery) use ($keyword) {
                    $subQuery->where('kry_nama_depan', 'like', "%{$keyword}%")
                            ->orWhere('kry_nama_blkg', 'like', "%{$keyword}%");
                });
            })
            ->when($filters['jabatan'] ?? null, function ($query, $jabatan) {
                $query->where('jab_main_id', $jabatan)
                      ->orWhere('jab_sec_id', $jabatan);
            })
            ->when($filters['golongan'] ?? null, function ($query, $golongan) {
                $query->where('gol_id', $golongan);
            });
    }

    // Relasi dengan tabel ess_msjabatan
    public function jabatanUtama(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'jab_main_id');
    }

    public function jabatanSekunder(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'jab_sec_id');
    }

    // Relasi dengan tabel ess_msgolongan
    public function golongan(): BelongsTo
    {
        return $this->belongsTo(Golongan::class, 'gol_id');
    }
}
