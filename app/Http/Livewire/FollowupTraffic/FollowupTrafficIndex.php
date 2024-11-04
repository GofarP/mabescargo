<?php

namespace App\Http\Livewire\FollowupTraffic;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FollowupTraffic;

class FollowupTrafficIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme="bootstrap";

    public function render()
    {
        $data_followup_traffic=FollowupTraffic::with('followupcustomer','wilayahasal','wilayahtujuan','karyawan')
        ->whereHas('followupcustomer',function($query){
            $query->where('nama','like','%'.$this->search.'%');
        })
        ->orWhereHas('wilayahasal',function($query){
            $query->where('nama','like','%'.$this->search.'%');
        })
        ->orWhereHas('wilayahtujuan',function($query){
            $query->where('nama','like','%'.$this->search.'%');
        })
        ->orWhereHas('karyawan',function($query){
            $query->where('nama','like','%'.$this->search.'%');
        })
        ->orWhere('no_telp','like','%'.$this->search.'%')
        ->orWhere('respon','like','%'.$this->search.'%')
        ->orWhere('kendala','like','%'.$this->search.'%')
        ->orWhere('barang','like','%'.$this->search.'%')
        ->orWhere('harga_barang','like','%'.$this->search.'%')
        ->orWhere('budget','like','%'.$this->search.'%')
        ->orWhere('harga_kendaraan','like','%'.$this->search.'%')
        ->paginate(10)
        ->onEachSide(1);


        return view('livewire.followup-traffic.followup-traffic-index',compact('data_followup_traffic'));
    }
}
