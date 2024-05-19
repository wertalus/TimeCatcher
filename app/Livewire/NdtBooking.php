<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Components;
use App\Models\Department;

class NdtBooking extends Component
{

    public $departments, $components;

    public function mount(){

        $this->departments = Department::get();
        //dd($this->departments);
        $this->components = Components::get();

    }

    public function ShowModal(){

        $this->dispatch('show-form');

    }

    #[Layout('layouts.NDT')]
    public function render()
    {
        return view('livewire.ndt-booking');
    }
}
