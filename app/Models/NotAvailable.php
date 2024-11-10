<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotAvailable extends Model
{
    use HasFactory;
    protected $table = 'not_available';
    protected $primaryKey = 'id';
    protected $fillable = [
        'date'
    ];
}
