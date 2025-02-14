<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{

    use WithFileUploads;

    public array $newimage = [
        'file' => null,
    ];

    public function render()
    {

        return view('livewire.register');
    }
}
