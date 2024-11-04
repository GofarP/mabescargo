<?php

namespace App\Http\Livewire\FollowupCustomerLama;

use Livewire\Component;
use App\Models\Karyawan;
use App\Models\TipeCustomer;
use Livewire\WithPagination;
use App\Models\KategoriCustomer;
use App\Models\FollowupCustomerLama;

class FollowupCustomerLamaIndex extends Component
{
    use WithPagination;

    public $search='',$data_tipe_customer,$data_kategori_customer,$data_karyawan;

    protected $paginationTheme='bootstrap';


    public function mount(){
        $this->data_tipe_customer=TipeCustomer::get();
        $this->data_kategori_customer=KategoriCustomer::get();
        $this->data_karyawan=Karyawan::get();

    }

    public function render()
    {
        $data_followup_customer_lama=FollowupCustomerLama::with('customerlama','karyawan','kategoricustomer','tipecustomer')
        ->whereHas('customerlama',function($query){
            $query->where('nama','like','%'.$this->search.'%');
        })
        ->orWhereHas('karyawan',function($query){
            $query->where('nama','like','%'.$this->search.'%');
        })
        ->orWhereHas('kategoricustomer',function($query){
            $query->where('nama','like','%'.$this->search.'%');
        })
        ->orWhereHas('tipecustomer',function($query){
            $query->where('nama','like','%'.$this->search.'%');
        })
        ->orWhere('respon','like','%'.$this->search.'%')
        ->orWhere('kendala','like','%'.$this->search.'%')
        ->orWhere('jumlah_kirim','like','%'.$this->search.'%')
        ->orderByDesc('tanggal')
        ->paginate(10)
        ->onEachSide(1);

        if(count($data_followup_customer_lama)<=10){
            $this->resetPage();
        }

        return view('livewire.followup-customer-lama.followup-customer-lama-index',compact('data_followup_customer_lama'));
    }
}
