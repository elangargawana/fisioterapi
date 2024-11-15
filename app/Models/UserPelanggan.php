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

    public function formulirs()
    {
        return $this->hasMany(TrxPelangganFormulir::class, 'pelanggan_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
