<?php

namespace App\Http\Livewire\SalesAfterService;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SalesAfterService;

class SalesAfterServiceIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme='bootstrap';

    public function render()
    {
        $data_sales_after_service = SalesAfterService::with('pesananmbscargo')
        ->whereHas('pesananmbscargo',function($query){
            $query->where('stt','like','%'.$this->search.'%');
        })
        ->orWhere('keterangan','like','%'.$this->search.'%')
        ->orWhere('kendala', 'LIKE', '%' . $this->search. '%')
        ->orWhere('kritik_saran', 'LIKE', '%' . $this->search. '%')
        ->orWhere('tingkat_kepuasan', 'LIKE', '%' . $this->search. '%')
        ->paginate(10)
        ->onEachSide(1);

        return view('livewire.sales-after-service.sales-after-service-index',compact('data_sales_after_service'));
    }
}
