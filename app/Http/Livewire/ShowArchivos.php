<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ShowArchivos extends Component
{
    use WithFileUploads;

    public function render()
    {
        return view('livewire.show-archivos');
    }
}
