<?php

namespace App\Livewire;
use App\Models\Schedule;
use Livewire\Component;

class Navbar extends Component
{
    public $notAccepted, $numberOfNotAccepted=0;

    public function mount()
    {
        $this->notAccepted = Schedule::where('status_id',1)->get();

        $this->numberOfNotAccepted = count($this->notAccepted);
        //dd($this->notAccepted);
    }

    public function render()
    {
        return view('livewire.navbar')
        ->with('numberOfNotAccepted', $this->numberOfNotAccepted)
        ->layout('layouts.NDT',['numberOfNotAccepted'=>$this->numberOfNotAccepted]);
    }
}
