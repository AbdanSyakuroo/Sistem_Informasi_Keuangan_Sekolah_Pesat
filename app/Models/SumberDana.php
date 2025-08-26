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

    public function penerimaanSumberDanas()
    {
        return $this->hasMany(PenerimaanDana::class);
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
