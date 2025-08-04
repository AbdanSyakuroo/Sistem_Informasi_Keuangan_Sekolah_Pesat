<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SumberDana extends Model
{
    protected $table = 'sumber_danas';

    protected $fillable = [
        'nama_sumber',
    ];

    public function pengeluarans()
{
    return $this->hasMany(Pengeluaran::class);
}

}
