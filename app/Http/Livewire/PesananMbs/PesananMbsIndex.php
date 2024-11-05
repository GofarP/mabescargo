<?php

namespace App\Http\Livewire\PesananMbs;

use App\Models\Cabang;
use Livewire\Component;
use App\Models\Karyawan;
use App\Models\PesananMbs;
use Livewire\WithPagination;
use App\Models\StatusPembayaran;

class PesananMbsIndex extends Component
{
    use WithPagination;

    public $search = "",$data_karyawan,$data_cabang,$data_status_pembayaran;

    protected $paginationTheme = 'bootstrap';


    public function mount(){
        $this->data_karyawan = Karyawan::get();
        $this->data_cabang = Cabang::get();
        $this->data_status_pembayaran = StatusPembayaran::get();
    }

    public function render()
    {
        $data_pesanan_mbs = PesananMbs::with('karyawan', 'customer', 'metodepembayaran', 'statuspembayaran', 'jalur', 'wilayahasal', 'wilayahtujuan', 'cabang')
            ->whereHas('karyawan', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('customer', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('metodepembayaran', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('statuspembayaran', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('jalur', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('wilayahasal', function ($query) {
                $query->where('nama', 'like', '%' . $this->search. '%');
            })
            ->orWhereHas('wilayahtujuan', function ($query) {
                $query->where('nama', 'like', '%' . $this->search. '%');
            })
            ->orWhereHas('cabang',function($query){
                $query->where('nama','like','%'.$this->search.'%');
            })
            ->orWhere('no_telp_penerima','like','%'.$this->search.'%')
            ->orWhere('resi','like','%'.$this->search.'%')
            ->orWhere('stt','like','%'.$this->search.'%')
            ->paginate(10)
            ->onEachSide(1);

        if(count($data_pesanan_mbs)<=10){
            $this->resetPage();
        }

        return view('livewire.pesanan-mbs.pesanan-mbs-index',compact('data_pesanan_mbs'));
    }
}
