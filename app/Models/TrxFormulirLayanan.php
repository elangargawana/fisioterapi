<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxFormulirLayanan extends Model
{
    use HasFactory;
    protected $table = 'trx_formulir_layanan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'formulir_id',
        'layanan_id'
    ];

    public function formulir()
    {
        return $this->belongsTo(TrxPelangganFormulir::class, 'formulir_id');
    }

    public function layanan()
    {
        return $this->belongsTo(MLayanan::class, 'layanan_id');
    }
}
