<?php

use App\Http\Controllers\Master\LayananController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserPelangganController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    $user = $request->user()->load('user_pelanggan');
    return response()->json($user);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('/master/layanan', LayananController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
});

require __DIR__ . '/auth.php';
