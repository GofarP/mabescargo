<?php

namespace App\Http\Livewire\FollowupCustomer;

use App\Models\Kontak;
use Livewire\Component;
use App\Models\Karyawan;
use Livewire\WithPagination;
use App\Models\FollowupCustomer;

class FollowupCustomerIndex extends Component
{
    use WithPagination;
    public $search = '',$data_karyawan,$data_jenis_kontak;

    protected $paginationTheme='bootstrap';


    public function mount(){
        $this->data_karyawan=Karyawan::get();
        $this->data_jenis_kontak=Kontak::get();
    }


    public function render()
    {
        $data_followup_customer=FollowupCustomer::with('wilayahasal','wilayahtujuan','kontak','karyawan')
        ->whereHas('wilayahasal', function ($query) {
            $query->where('nama', 'LIKE', '%'. $this->search. '%');
        })
        ->orWhereHas('wilayahtujuan', function ($query) {{
            $query->where('nama', 'LIKE', '%'. $this->search. '%');
        }})
        ->orWhere('nama', 'LIKE', '%'. $this->search. '%')
        ->orWhere('no_telp', 'LIKE', '%'. $this->search. '%')
        ->orWhere('harga_barang', 'LIKE', '%'. $this->search. '%')
        ->orWhere('harga_kendaraan', 'LIKE', '%'. $this->search. '%')
        ->orWhere('berat_minimal', 'LIKE', '%'. $this->search. '%')
        ->orWhere('budget', 'LIKE', '%'. $this->search. '%')
        ->orWhere('keterangan_harga', 'LIKE', '%'. $this->search. '%')
        ->orWhere('kontak_id', 'LIKE', '%'. $this->search. '%')
        ->orWhere('barang', 'LIKE', '%'. $this->search. '%')
        ->orWhere('kendala', 'LIKE', '%'. $this->search. '%')
        ->orWhere('tanggapan', 'LIKE', '%'. $this->search. '%')
        ->orWhere('status', 'LIKE', '%'. $this->search. '%')
        ->paginate(1)
        ->onEachSide(1);

        if(count($data_followup_customer)<=10){
            $this->resetPage();
        }

        return view('livewire.followup-customer.followup-customer-index',compact('data_followup_customer'));
    }
}
