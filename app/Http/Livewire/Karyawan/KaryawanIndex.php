<?php

namespace App\Http\Livewire\Karyawan;

use Livewire\Component;
use App\Models\Karyawan;
use Livewire\WithPagination;

class KaryawanIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme='bootstrap';
    public function render()
    {
        $data_karyawan=Karyawan::where('nama','like','%'.$this->search.'%')
        ->orderByDesc('created_at')
        ->paginate(10)
        ->onEachSide(1);

        if(count($data_karyawan)<=10){
            $this->resetPage();
        }
        return view('livewire.karyawan.karyawan-index',compact('data_karyawan'));
    }
}
