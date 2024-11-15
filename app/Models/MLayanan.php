<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MLayanan extends Model
{
    use HasFactory;
    protected $table = 'm_layanan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'deskripsi',
        'biaya',
        'status'
    ];

    public function formulir()
    {
        return $this->belongsToMany(TrxPelangganFormulir::class);
    }
}
