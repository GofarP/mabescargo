<?php

namespace App\Http\Livewire\StatusPembayaran;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StatusPembayaran;

class StatusPembayaranIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data_status_pembayaran = StatusPembayaran::where('nama', 'LIKE', '%' . $this->search . '%')
            ->paginate(10)
            ->onEachSide(1);

        // Check if the total number of records is less than or equal to 10
        if ($data_status_pembayaran->total() <= 10) {
            $this->resetPage();
        }
        return view('livewire.status-pembayaran.status-pembayaran-index', compact('data_status_pembayaran'));
    }
}
