<?php

namespace App\Http\Livewire\Kontak;

use App\Models\Kontak;
use Livewire\Component;
use Livewire\WithPagination;

class KontakIndex extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $data_kontak = Kontak::where('nama', 'like', '%' . $this->search . '%')
            ->orderByDesc('created_at')
            ->paginate(10)
            ->onEachSide(1);

        if (count($data_kontak) <= 10) {
            $this->resetPage();
        }

        return view('livewire.kontak.kontak-index', compact('data_kontak'));
    }
}
