<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $table = 'tbUser';
    protected $primaryKey = 'idUser';
    public $timestamps = false;

    protected $fillable = ['username', 'password', 'idRole', 'createdBy', 'createDate', 'status'];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'idRole', 'idRole');
    }


    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'username', 'username');
    }

    public function files(): HasMany
    {
        return $this->hasMany(FileSpreadsheet::class, 'createdBy', 'username');
    }
}
