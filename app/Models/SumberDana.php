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
        return $this->hasMany(Pengeluaran::class , 'sumber_dana_id');
    }

    public function penerimaanSumberDanas()
    {
        return $this->hasMany(PenerimaanDana::class , 'sumber_dana_id');
    }

    public function getTotalPenerimaanAttribute()
    {
        return $this->penerimaanSumberDanas()->sum('nominal');
    }

    public function getTotalPengeluaranAttribute()
    {
        return $this->pengeluarans()->sum('nominal');
    }

    public function getSaldoAttribute()
    {
        return $this->total_penerimaan - $this->total_pengeluaran;
    }

}
