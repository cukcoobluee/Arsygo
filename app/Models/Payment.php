<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'nama','telepon','email','jumlah_peserta',
        'harga_per_orang','total_bayar','tanggal',
        'catatan','bukti_pembayaran','status','kategori_trip'
    ];

}

