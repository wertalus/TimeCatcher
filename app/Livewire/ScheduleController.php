<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Component
{
    public function render()
    {
        return view('livewire.schedule-controller');
    }

    public function getEvents(){

        
        $data=Schedule::all();

        return response()->json($data);
    }
}
