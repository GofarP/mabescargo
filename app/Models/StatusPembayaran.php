<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function pesananmbs(){
        return $this->hasMany(PesananMbs::class,'status_pembayaran_id','id');
    }
}
