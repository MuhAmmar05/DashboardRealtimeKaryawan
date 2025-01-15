<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'ess_msgolongan';
    protected $primaryKey = 'gol_id';
    public $timestamps = false;

    protected $fillable = [
        'gol_desc',
        'gol_status',
        'gol_created_by',
        'gol_created_date',
        'gol_modif_by',
        'gol_modif_date',
    ];
}
