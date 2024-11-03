<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatanWilayah extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function wilayah(){
        return $this->hasMany(Wilayah::class,'tingkatan_wilayah_id','id');
    }
}
