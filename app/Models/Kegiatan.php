<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatans';

    protected $fillable = [
        'kode_kegiatan',
        'nama_kegiatan',
    ];


    public function pengeluarans()
{
    return $this->hasMany(Pengeluaran::class);
}

}


