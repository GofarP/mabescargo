<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesAfterService extends Model
{
    use HasFactory;

    protected $guarded=[''];

    public function pesananmbscargo(){
        return $this->belongsTo(PesananMbs::class,'pesanan_mbs_cargo_id','id');
    }
}
