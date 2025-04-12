<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokObat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_obat',
        'stok',
        'jenis_obat',
        'takaran'
    ];
}
