<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxPelangganFormulir extends Model
{
    use HasFactory;
    protected $table = 'trx_pelanggan_formulir';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pelanggan_id',
        'keluhan',
        'waktu_terapi',
        'tempat_terapi'
    ];
}
