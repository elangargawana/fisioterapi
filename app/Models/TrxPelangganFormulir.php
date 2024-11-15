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
        'tempat_terapi',
        'nomor_antrian',
        'is_done_terapist',
        'is_done_user'
    ];

    public function m_layanan()
    {
        return $this->belongsToMany(MLayanan::class);
    }

    public function riwayatTransaksi()
    {
        return $this->hasOne(RiwayatTransaksi::class, 'transaksi_id');
    }
}
