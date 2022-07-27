<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class produk extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'produk';

    // protected $fillable = [
    //     'foto',
    //     'NIK',
    //     'nama',
    //     'tm_lahir',
    //     'tgl_lahir',
    //     'jk',
    //     'agama',
    //     'status',
    //     'goldar',
    //     'pekerjaan',
    //     'wn',
    //     'provinsi',
    //     'kab',
    //     'kec',
    //     'kel',
    //     'rt',
    //     'rw',
    //     'add',
    // ];

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
