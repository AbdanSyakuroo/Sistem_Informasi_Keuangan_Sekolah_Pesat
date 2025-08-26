<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanDana extends Model
{
    use HasFactory;

    protected $table = 'penerimaan_danas';

    protected $fillable = [
        'sumber_dana_id',
        'tanggal',
        'uraian',
        'nominal',
    ];

    public function sumberDana()
    {
        return $this->belongsTo(SumberDana::class);
    }
}
