<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriSampah extends Model
{
    use HasFactory;

    protected $table = 'kategori_sampah';

    protected $fillable = ['nama', 'deskripsi'];
}
