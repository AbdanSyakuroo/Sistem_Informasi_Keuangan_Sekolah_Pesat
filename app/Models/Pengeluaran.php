<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'sumber_dana_id',
        'nominal',
        'uraian',
        'tanggal',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function sumberDana()
    {
        return $this->belongsTo(SumberDana::class);
    }
}
