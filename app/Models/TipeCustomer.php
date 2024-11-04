<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeCustomer extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function followupcustomerlama(){
        return $this->hasMany(FollowupCustomerLama::class,'tipe_customer_id','id');
    }
}
