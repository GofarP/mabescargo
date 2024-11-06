<?php

namespace App\Http\Livewire\StatusManifes;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StatusManifes;

class StatusManifesIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme='bootstrap';


    public function render()
    {
        $data_status_manifes=StatusManifes::where('nama','like','%'.$this->search.'%')
        ->orWhere('nama','like','%'.$this->search.'%')
        ->paginate(10)
        ->onEachSide(1);

        if(count($data_status_manifes)<=10){
            $this->resetPage();
        }
        
        return view('livewire.status-manifes.status-manifes-index',compact('data_status_manifes'));
    }
}
