<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiSetor extends Model
{
    protected $table = 'transaksi_setor';

    protected $fillable = ['nasabah_id', 'tanggal', 'total_berat', 'total_harga'];

    public function nasabah()
    {
        return $this->belongsTo(User::class, 'nasabah_id');
    }

    public function details()
    {
        return $this->hasMany(TransaksiSetorDetail::class);
    }
}
