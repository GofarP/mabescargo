<?php

namespace App\Models;

use App\Models\Kontak;
use App\Models\Wilayah;
use App\Models\Karyawan;
use App\Models\FollowupTraffic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FollowupCustomer extends Model
{
    use HasFactory;

    protected $guarded=[''];

    public function wilayahasal(){
        return $this->belongsTo(Wilayah::class,'wilayah_asal_id','id');
    }

    public function wilayahtujuan(){
        return $this->belongsTo(Wilayah::class,'wilayah_tujuan_id','id');
    }

    public function kontak(){
        return $this->belongsTo(Kontak::class,'kontak_id','id');
    }

    public function karyawan(){
        return $this->belongsTo(Karyawan::class,'karyawan_id','id');
    }


    public function followuptraffic(){
        return $this->hasMany(FollowupTraffic::class,'followup_customer_id','id');
    }
}
