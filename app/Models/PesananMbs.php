<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananMbs extends Model
{
    use HasFactory;

    protected $guarded=[''];

    public function karyawan(){
        return $this->belongsTo(Karyawan::class,'karyawan_id','id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function metodepembayaran(){
        return $this->belongsTo(MetodePembayaran::class,'metode_pembayaran_id','id');
    }

    public function statuspembayaran(){
        return $this->belongsTo(StatusPembayaran::class,'status_pembayaran_id','id');
    }

    public function jalur(){
        return $this->belongsTo(Jalur::class,'jalur_id','id');
    }
    public function wilayahasal(){
        return $this->belongsTo(Wilayah::class,'wilayah_asal_id','id');
    }

    public function wilayahtujuan(){
        return $this->belongsTo(Wilayah::class,'wilayah_tujuan_id','id');
    }

    public function cabang(){
        return $this->belongsTo(Cabang::class,'cabang_id','id');
    }

    public function salesafterservice(){
        return $this->hasMany(SalesAfterService::class,'pesanan_mbs_cargo_id','id');
    }


}
