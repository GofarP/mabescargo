<?php

namespace App\Http\Livewire\SebarBrosur;

use Livewire\Component;
use App\Models\SebarBrosur;
use Livewire\WithPagination;

class SebarBrosurIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme='bootstrap';

    public function render()
    {
        $data_sebar_brosur=SebarBrosur::with('karyawan')
        ->whereHas('karyawan',function($query){
            $query->where('nama','LIKE','%'.$this->search.'%');
        })
        ->orWhere('nama_toko','like','%'.$this->search.'%')
        ->orWhere('nama','like','%'.$this->search.'%')
        ->orWhere('no_telp','like','%'.$this->search.'%')
        ->orWhere('alamat','like','%'.$this->search.'%')
        ->orWhere('pernah_pakai_ekspedisi','%'.$this->search.'%')
        ->orWhere('nama_ekspedisi','%'.$this->search.'%')
        ->orWhere('biaya','%'.$this->search.'%')
        ->orWhere('kenal_mbs_cargo','%'.$this->search.'%')
        ->orWhere('keterangan','%'.$this->search.'%')
        ->orderByDesc('tanggal')
        ->paginate(10)
        ->onEachSide(1);

        if(count($data_sebar_brosur)<=10){
            $this->resetPage();
        }

        return view('livewire.sebar-brosur.sebar-brosur-index',compact('data_sebar_brosur'));
    }
}
