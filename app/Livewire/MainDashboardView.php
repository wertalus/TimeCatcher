<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class MainDashboardView extends Component
{
    #[Layout('layouts.app2')]
    public function render()
    {
        return view('livewire.main-dashboard-view');
    }
}
