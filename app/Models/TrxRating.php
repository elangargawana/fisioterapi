<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxRating extends Model
{
    use HasFactory;
    protected $table = 'trx_rating';
    protected $primaryKey = 'id';
    protected $fillable = [
        'transaksi_id',
        'rating',
        'feedback'
    ];

    public function transaksi()
    {
        return $this->belongsTo(TrxPelangganFormulir::class, 'transaksi_id');
    }
}
