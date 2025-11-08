<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CvTemplate;

class TemplateSlider extends Component
{
    
    public $templates;

    public function mount()
    {
        // Ambil semua template dari database
        $this->templates = CvTemplate::all();
    }

    public function render()
    {
        return view('livewire.template-slider');
    }
}
