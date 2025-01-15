<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileSpreadsheet extends Model
{
    protected $table = 'dkw_trfilespreadsheet';
    protected $primaryKey = 'fsp_id';
    public $timestamps = false;

    protected $fillable = [
        'fsp_namaFile',
        'fsp_status',
        'fsp_created_by',
        'fsp_created_date',
        'fsp_modif_by',
        'fsp_modif_date'
    ];
}
