<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Schedule;
use App\Models\Status;

use Livewire\Attributes\Layout;


class Todolist extends Component
{

    public $events, $status;

    public function mount()
    {
        $this->events = Schedule::get();
        $this->status = Status::get();
        //dd($this->status);
    }

    #[Layout('layouts.NDT')]
    public function render()
    {
        return view('livewire.todolist');
    }
}
