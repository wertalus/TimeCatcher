<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Schedule;
use App\Models\Status;
use Carbon\Carbon;

use Livewire\Attributes\Layout;


class Todolist extends Component
{
    public $events, $status, $id, $created_by, $created_at, $cell, $component, $ready_date, $current_status;

    public function mount()
    {
        $this->events = Schedule::get();
        $this->status = Status::get();
        //dd($this->status);
    }

    public function ShowUpdateModal($booking_id){
        
        $booking = Schedule::find($booking_id);

        $this->id = $booking->id;
        //dd($booking);
        $this->created_by = $booking->created_by;
        $this->created_at = $booking->created_at;
        $this->cell = $booking->Cell->cell_name;
        $this->component = $booking->Component->component_name;
        $this->ready_date = $booking->start;
        $this->current_status = $booking->Status->status_name;
        $this->dispatch('show-update-modal');
    }

    #[Layout('layouts.NDT')]
    public function render()
    {
        return view('livewire.todolist');
    }
}
