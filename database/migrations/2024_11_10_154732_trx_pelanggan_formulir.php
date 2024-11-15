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
        Schema::create('trx_pelanggan_formulir', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id');
            $table->string('keluhan');
            $table->timestamp('waktu_terapi');
            $table->string('tempat_terapi')->nullable();
            $table->integer('nomor_antrian');
            $table->integer('is_done_terapist')->default(0);
            $table->integer('is_done_user')->default(0);
            $table->timestamps();

            $table->foreign('pelanggan_id')->references('id')->on('user_pelanggan')->cascadeOnDelete();
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
