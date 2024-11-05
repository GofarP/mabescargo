<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable=['nama'];

    public function followupcustomer(){
        return $this->hasMany(FollowupCustomer::class,'karyawan_id','id');
    }

    public function followupcustomerlama(){
        return $this->hasMany(FollowupCustomerLama::class,'karyawan_id','id');
    }

    public function pesananmbs(){
        return $this->hasMany(PesananMbs::class,'karyawan_id','id');
    }

    public function sebarbrosur(){
        return $this->belongsTo(SebarBrosur::class,'karyawan_id','id');
    }

}
