<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sso_msuser extends Model
{
    use HasFactory;

    protected $table = 'sso_msuser'; // Sesuaikan dengan nama tabel

    protected $primaryKey = 'usr_id'; // Sesuaikan dengan primary key

    public $incrementing = false; // Jika primary key bukan auto-increment

    protected $fillable = [
        'usr_id',
        'usr_password',
    ];
}
