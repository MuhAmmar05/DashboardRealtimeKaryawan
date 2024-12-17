<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $table = 'tbRole';
    protected $primaryKey = 'idRole';
    public $timestamps = false;

    protected $fillable = ['namaRole', 'createdBy', 'createDate', 'status'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'idRole', 'idRole');
    }
}

?>