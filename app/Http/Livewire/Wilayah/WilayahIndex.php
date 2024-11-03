<?php

namespace App\Http\Livewire\Wilayah;

use App\Models\Wilayah;
use Livewire\Component;
use Livewire\WithPagination;

class WilayahIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme="bootstrap";

    public function render()
    {
        $data_wilayah=Wilayah::with('tingkatanwilayah')
        ->whereHas('tingkatanwilayah',function($query){
            $query->where('nama','like','%'.$this->search.'%');
        })
        ->orWhere('nama','like','%'.$this->search.'%')
        ->orderBy('created_at','desc')
        ->paginate(10)
        ->onEachSide(1);

        if(count($data_wilayah)<=10){
            $this->resetPage();
        }
        return view('livewire.wilayah.wilayah-index',compact('data_wilayah'));
    }
}
