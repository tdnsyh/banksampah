<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisSampah extends Model
{
    use HasFactory;

    protected $table = 'jenis_sampah';

    protected $fillable = [
        'kategori_sampah_id',
        'nama',
        'deskripsi',
        'harga_per_kg',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSampah::class, 'kategori_sampah_id');
    }

    public function transaksiDetails()
{
    return $this->hasMany(TransaksiSetorDetail::class, 'jenis_sampah_id');
}
}
