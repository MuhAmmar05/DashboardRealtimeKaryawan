<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kehadiran extends Model
{
    protected $table = 'tbKehadiran';
    protected $primaryKey = 'idKehadiran';
    public $timestamps = false;

    protected $fillable = ['username', 'logMasuk', 'logKeluar', 'statusKehadiran', 'keteranganKehadiran', 'catatan', 'createDate'];

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'username', 'username');
    }
}