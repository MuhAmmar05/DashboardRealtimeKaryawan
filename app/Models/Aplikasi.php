<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $table = 'sso_msaplikasi';
    protected $primaryKey = 'app_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'app_id',
        'app_deskripsi',
        'app_tautan',
        'app_status',
        'app_created_by',
        'app_created_date',
        'app_modif_by',
        'app_modif_date',
    ];
}
