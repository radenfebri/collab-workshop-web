<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $fillable = [
        'kategoribuku_id', 'name', 'description', 'original_price', 'slug',
        'selling_price', 'cover', 'popular', 'qty'
    ];

    protected $hidden = [];

    public function kategoribuku()
    {
        return $this->belongsTo(KategoriBuku::class, 'kategoribuku_id');
    }
}
