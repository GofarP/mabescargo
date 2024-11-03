<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLama extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'no_telp',
        'organisasi',
        'alamat_detail',
        'agama',
        'tanggal_lahir',
        'tempat_lahir',
        'wilayah_id'
    ];

    public function wilayah(){
        return $this->belongsTo(Wilayah::class,'wilayah_id','id');
    }
}
