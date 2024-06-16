<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class NewTheme extends Component
{
    #[Layout('layouts.NDT')]
    public function render()
    {
        return view('livewire.new-theme');
    }
}
