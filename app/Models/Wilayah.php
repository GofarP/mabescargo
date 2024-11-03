<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
