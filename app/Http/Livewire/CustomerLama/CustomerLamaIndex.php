<?php

namespace App\Http\Livewire\CustomerLama;

use Livewire\Component;
use App\Models\CustomerLama;
use Livewire\WithPagination;

class CustomerLamaIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data_customer_lama = CustomerLama::with('wilayah')
            ->whereHas('wilayah', function ($query) {
                $query->where('nama', 'LIKE', '%' . $this->search . '%');
            })
            ->orWhere('nama', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->orWhere('no_telp', 'LIKE', '%' . $this->search . '%')
            ->orWhere('organisasi', 'LIKE', '%' . $this->search . '%')
            ->orWhere('alamat_detail', 'LIKE', '%' . $this->search . '%')
            ->orWhere('agama', 'LIKE', '%' . $this->search . '%')
            ->orWhere('tempat_lahir', 'LIKE', '%' . $this->search . '%')
            ->paginate(10)
            ->onEachSide(1);

            if(count($data_customer_lama)<=10){
                $this->resetPage();
            }

        return view('livewire.customer-lama.customer-lama-index',compact('data_customer_lama'));
    }
}
