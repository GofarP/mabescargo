<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriCustomer extends Model
{
    use HasFactory;
    public $fillable=['nama'];

    public function followupcustomerlama(){
        return $this->hasMany(FollowupCustomerLama::class,'kategori_customer_id','id');
    }
}
