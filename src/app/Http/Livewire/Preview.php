<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Preview extends Component
{
    use WithFileUploads;

    public $image;

    public function save()
    {
        $this->validate([
            'image' => 'required'| 'mimes:png,jpeg',
        ],
        [
            'image.required' => 'ファイルを選択してください',
            'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください'
        ]);

        $this->image->store('images');

        return view('livewire.preview');
    }

    // public function render()
    // {
        
    // }
}
