<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jalur extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function pesananmbs(){
        return $this->hasMany(PesananMbs::class,'jalur_id','id');
    }

    public function daftarharga(){
        return $this->belongsTo(Jalur::class,'jalur_id','id');
    }
}
