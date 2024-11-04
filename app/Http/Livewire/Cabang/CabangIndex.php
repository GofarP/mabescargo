<?php

namespace App\Http\Livewire\Cabang;

use App\Models\Cabang;
use Livewire\Component;
use Livewire\WithPagination;

class CabangIndex extends Component
{
    use WithPagination;

    protected $paginationTheme='bootstrap';

    public $search;

    public function render()
    {
        $data_cabang=Cabang::where('nama','like','%'.$this->search.'%')
        ->orderByDesc('created_at')
        ->paginate(10)
        ->onEachSide(1);

        if(count($data_cabang)<=10){
            $this->resetPage();
        }

        return view('livewire.cabang.cabang-index',compact('data_cabang'));
    }
}
