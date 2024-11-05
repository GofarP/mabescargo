<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function pesananmbs(){
        return $this->hasMany(PesananMbs::class,'metode_pembayaran_id','id');
    }
}
