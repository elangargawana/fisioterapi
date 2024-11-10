<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPelanggan extends Model
{
    use HasFactory;
    protected $table = 'user_pelanggan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'gender',
        'alamat',
        'no_hp'
    ];
}
