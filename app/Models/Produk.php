<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function pesanan_detail()
    {
        return $this->belongsTo(Pesanan_detail::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
