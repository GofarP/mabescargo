<?php

namespace App\Http\Livewire\TipeCustomer;

use App\Models\TipeCustomer;
use Livewire\Component;
use Livewire\WithPagination;
class TipeCustomerIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme='bootstrap';

    public function render()
    {
        $data_tipe_customer=TipeCustomer::where('nama','LIKE','%'.$this->search.'%')
        ->paginate(10)
        ->onEachSide(1);
        return view('livewire.tipe-customer.tipe-customer-index',compact('data_tipe_customer'));
    }
}
