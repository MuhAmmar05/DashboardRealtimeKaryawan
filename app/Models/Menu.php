<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'sso_msmenu';
    protected $primaryKey = 'men_id';
    public $timestamps = false;

    protected $fillable = [
        'app_id',
        'rol_id',
        'men_nama',
        'men_link',
        'men_status',
        'men_created_by',
        'men_created_date',
        'men_modif_by',
        'men_modif_date',
    ];
}
