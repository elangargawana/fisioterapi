<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatTransaksi extends Model
{
    use HasFactory;
    protected $table = 'riwayat_transaksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'transaksi_id',
        'order_id',
        'total_bayar',
        'snap_token',
        'status'
    ];
}
