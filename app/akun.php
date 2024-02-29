<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class akun extends Model
{
    
    protected $fillable = [
        'no_reff', 'nama_akuns', 'keterangan'
    ];

    protected $primaryKey = 'no_reff';

    public function transaksi()
    {
        return $this->hasMany(Transaksi::Class, 'no_reff');
    }
}
