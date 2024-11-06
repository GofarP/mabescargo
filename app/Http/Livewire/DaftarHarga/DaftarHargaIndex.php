<?php

namespace App\Http\Livewire\DaftarHarga;

use App\Models\DaftarHarga;
use Livewire\Component;
use Livewire\WithPagination;
class DaftarHargaIndex extends Component
{
    use WithPagination;
    public $search;

    protected $paginationTheme='bootstrap';

    public function render()
    {
        $data_daftar_harga=DaftarHarga::with('wilayahasal','wilayahtujuan','jalur')
        ->whereHas('wilayahasal',function($query){
            $query->where('nama','like','%'.$this->search.'%');
        })
        ->orWhereHas('wilayahtujuan',function($query){
            $query->where('nama','like','%'.$this->search.'%');
        })
        ->orWhereHas('jalur',function($query){
            $query->where('nama','like','%'.$this->search.'%');
        })
        ->orWhere('harga_asal','like','%'.$this->search.'%')
        ->orWhere('harga_satuan','like','%'.$this->search.'%')
        ->paginate(10)
        ->onEachSide(1);

        if(count($data_daftar_harga)<=10){
            $this->resetPage();
        }

        return view('livewire.daftar-harga.daftar-harga-index',compact('data_daftar_harga'));

    }
}
