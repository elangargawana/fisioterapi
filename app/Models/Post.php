<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul',
        'category_id',
        'thumbnail',
        'content',
        'is_active'
    ];

    public function category()
    {
        return $this->belongsTo(MCategory::class, 'category_id');
    }
}
