<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'sso_msuser';
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = ['usr_id', 'rol_id', 'app_id'];
    protected $fillable = [
        'usr_id',
        'rol_id',
        'app_id',
        'usr_password',
        'usr_status',
        'usr_created_by',
        'usr_created_date',
        'usr_modif_by',
        'usr_modif_date',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_id', 'rol_id');
    }

    public function app()
    {
        return $this->belongsTo(App::class, 'app_id', 'app_id');
    }
}
