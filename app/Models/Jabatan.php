<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'ess_msjabatan';
    protected $primaryKey = 'jab_id';
    public $timestamps = false;

    protected $fillable = [
        'jab_desc',
        'jab_status',
        'jab_created_by',
        'jab_created_date',
        'jab_modif_by',
        'jab_modif_date',
        'jab_order',
    ];
}
