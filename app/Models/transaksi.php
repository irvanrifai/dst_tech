<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function scopeFind($query)
    {
        //
    }
}
