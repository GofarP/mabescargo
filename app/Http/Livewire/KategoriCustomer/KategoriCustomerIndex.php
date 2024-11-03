<?php

namespace App\Http\Livewire\KategoriCustomer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KategoriCustomer;

class KategoriCustomerIndex extends Component
{
    use WithPagination;
    public $search;

    protected $paginationTheme='bootstrap';
    public function render()
    {
        $data_kategori_customer=KategoriCustomer::where('nama','LIKE','%'.$this->search.'%')
        ->paginate(10)
        ->OnEachSide(1);

        if(count($data_kategori_customer)<=10){
            $this->resetPage();
        }


        return view('livewire.kategori-customer.kategori-customer-index',compact('data_kategori_customer'));
    }
}
