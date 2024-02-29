<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    

    protected $fillable = [
        'no_reff', 'keterangan', 'jenis_saldo', 'saldo', 'tanggal_transaksi', 'tanggal_input'
    ];

    protected $hidden = [''];


    public function akun()
    {
        return $this->belongsTo(akun::class, 'no_reff');
    }
}
