<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Karyawan extends Model
{
    protected $table = 'tbKaryawan';
    protected $primaryKey = 'username';
    public $incrementing = false; // Karena username bukan auto-increment
    public $timestamps = false;

    protected $fillable = ['npk', 'namaKaryawan', 'createdBy', 'createDate', 'status'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'username', 'username');
    }

    public function kehadiran(): HasMany
    {
        return $this->hasMany(Kehadiran::class, 'username', 'username');
    }
}