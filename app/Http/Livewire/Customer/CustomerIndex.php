<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerIndex extends Component
{

    use WithPagination;

    protected $paginationTheme='bootstrap';

    public $search="";

    public function render()
    {
        $data_customer=Customer::with('wilayah')
        ->whereHas('wilayah',function($query){
            $query->where('nama','like','%'.$this->search.'%');
        })
        ->orWhere('nama','like','%'.$this->search.'%')
        ->orWhere('email','like','%'.$this->search.'%')
        ->orWhere('no_telp','like','%'.$this->search.'%')
        ->orWhere('alamat_detail','like','%'.$this->search.'%')
        ->orWhere('agama','like','%'.$this->search.'%')
        ->orWhere('tempat_lahir','like','%'.$this->search.'%')
        ->orderByDesc('tanggal')
        ->paginate(10)
        ->onEachSide(1);


        if(count($data_customer)<=10){
            $this->resetPage();
        }


        return view('livewire.customer.customer-index',compact('data_customer'));

    }
}
