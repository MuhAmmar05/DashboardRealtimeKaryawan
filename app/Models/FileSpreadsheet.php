<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FileSpreadsheet extends Model
{
    protected $table = 'tbFileSpreadsheet';
    protected $primaryKey = 'idSpreadsheet';
    public $timestamps = false;

    protected $fillable = ['namaFile', 'createdBy', 'createDate', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'createdBy', 'idUser');
    }
}
