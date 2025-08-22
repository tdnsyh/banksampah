<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoNasabah extends Model
{
    use HasFactory;

    protected $table = 'saldo_nasabah';

    protected $fillable = [
        'nasabah_id',
        'saldo',
    ];

    /**
     * Relasi ke user (nasabah)
     */
    public function nasabah()
    {
        return $this->belongsTo(User::class, 'nasabah_id');
    }

    /**
     * Tambahkan saldo
     */
    public function tambahSaldo($jumlah)
    {
        $this->saldo += $jumlah;
        $this->save();
    }

    /**
     * Kurangi saldo
     */
    public function kurangiSaldo($jumlah)
    {
        if($jumlah > $this->saldo){
            throw new \Exception('Saldo tidak cukup');
        }
        $this->saldo -= $jumlah;
        $this->save();
    }
}
