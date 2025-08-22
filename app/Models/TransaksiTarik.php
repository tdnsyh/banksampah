<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiTarik extends Model
{
    use HasFactory;

    protected $table = 'transaksi_tarik';

    protected $fillable = [
        'nasabah_id',
        'tanggal',
        'jumlah',
    ];

    /**
     * Relasi ke nasabah
     */
    public function nasabah()
    {
        return $this->belongsTo(User::class, 'nasabah_id');
    }
}
