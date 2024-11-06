<?php

namespace App\Models;

use App\Models\Vendor;
use App\Models\Customer;
use App\Models\CustomerLama;
use App\Models\TingkatanWilayah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wilayah extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'tingkatan_wilayah_id'];

    public function tingkatanwilayah(){
        return $this->belongsTo(TingkatanWilayah::class,'tingkatan_wilayah_id','id');
    }

    public function customer(){
        return $this->hasMany(Customer::class,'wilayah_id','id');
    }

    public function customerlama(){
        return $this->hasMany(CustomerLama:: class,'wilayah_id','id');
    }


    public function vendor(){
        return $this->hasMany(Vendor::class,'wilayah_id','id');
    }
}
