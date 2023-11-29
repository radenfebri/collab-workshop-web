<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'buku_id', 'name', 'email', 'status',
        'metode', 'tracking_no', 'total_price', 'bukti',
    ];

    protected $hidden = [];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'metode', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
