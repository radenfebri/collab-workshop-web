<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    use HasFactory;

    protected $table = 'kategori_bukus';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'kategoribuku_id', 'id');
    }
}
