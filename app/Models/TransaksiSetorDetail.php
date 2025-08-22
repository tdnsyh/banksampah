<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiSetorDetail extends Model
{
    protected $table = 'transaksi_setor_detail';

    protected $fillable = ['transaksi_setor_id', 'jenis_sampah_id', 'berat', 'subtotal'];

    public function transaksi()
    {
        return $this->belongsTo(TransaksiSetor::class, 'transaksi_setor_id');
    }

    public function jenisSampah()
    {
        return $this->belongsTo(JenisSampah::class);
    }
    public function transaksiSetor()
{
    return $this->belongsTo(TransaksiSetor::class, 'transaksi_setor_id');
}
}
