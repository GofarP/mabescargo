<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarHarga extends Model
{
    use HasFactory;

    protected $guarded=[''];

    public function wilayahasal(){
        return $this->belongsTo(Wilayah::class,'wilayah_asal_id','id');
    }

    public function wilayahtujuan(){
        return $this->belongsTo(Wilayah::class,'wilayah_tujuan_id','id');
    }

    public function jalur(){
        return $this->belongsTo(Jalur::class,'jalur_id','id');
    }
}
