<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('order_id');
            $table->string('total_bayar');
            $table->string('snap_token');
            $table->enum('status', ['success', 'pending', 'failed']);
            $table->timestamps();

            $table->foreign('transaksi_id')->references('id')->on('trx_pelanggan_formulir')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
