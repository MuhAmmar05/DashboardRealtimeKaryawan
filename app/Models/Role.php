<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'sso_msrole';
    protected $primaryKey = 'rol_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'rol_id',
        'rol_deskripsi',
        'rol_status',
        'rol_created_by',
        'rol_created_date',
        'rol_modif_by',
        'rol_modif_date',
    ];
}
