<?php

namespace App\Http\Livewire\Jalur;

use App\Models\Jalur;
use Livewire\Component;
use Livewire\WithPagination;

class JalurIndex extends Component
{
    use WithPagination;
    public $search="";

    protected $paginationTheme='bootstrap';

    public function render()
    {
        $data_jalur=Jalur::where('nama','like','%'.$this->search.'%')
        ->orderByDesc('created_at')
        ->paginate(10)
        ->onEachSide(1);
        return view('livewire.jalur.jalur-index',compact('data_jalur'));
    }
}
