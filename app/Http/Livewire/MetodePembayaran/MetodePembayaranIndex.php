<?php

namespace App\Http\Livewire\MetodePembayaran;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MetodePembayaran;

class MetodePembayaranIndex extends Component
{
    use WithPagination;

    public $search="";
    protected $paginationTheme='bootstrap';
    public function render()
    {
        $data_metode_pembayaran=MetodePembayaran::where('nama','LIKE','%'.$this->search.'%')
        ->paginate(10)
        ->onEachSide(1);

        if(count($data_metode_pembayaran)<=10){
            $this->resetPage();
        }
        
        return view('livewire.metode-pembayaran.metode-pembayaran-index',compact('data_metode_pembayaran'));
    }
}
