<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Components;
use App\Models\Department;
use App\Models\Schedule;
use App\Models\Cell;
use DateTime;
use DateInterval;
use Livewire\Attributes\Validate;

class NdtBooking extends Component
{

    public $departments, $components, $department_id, $title, $department_name, $component_id, $start, $date, $time, $hours, $minutes;
    
    #[Validate('required', message:'Nr komponentu wymagany.')] 
    #[Validate('regex:/^[0-9]{4}+\/[1-2]{1}$/', message:'Numer musi być wprowadzony w odpowiednim formacie 1234/1 lub 1234/2.')] 
    public $component_pattern_number;

    public function mount(){

        $this->departments = Department::get();
        $this->components=[];
    }

    public function messages() 
    {
        return [
            'component_pattern_number.required' => 'Nr komponentu wymagany.',
            'component_pattern_number.regex' => 'Numer musi być wprowadzony w odpowiednim formacie 1234/1 lub 1234/2.',
        ];
    }

    public function GetComponents()
    {
        $this->components=Components::where('department_id',$this->department_id)->get();
        
    }

    public function ShowModal(){

        $this->dispatch('show-form');

    }

    public function validation($date):bool
    {
        $events = Schedule::where('start', $date)->get();
        if(count($events)==0)
            return true;
        else
        {
            session()->flash('date', 'Post successfully updated.');
 
            return false;
        }
            
    }

    public function AddNewEvent()
    {

        //$validated = $this->validate();
        $event = new Schedule;

        //.dd($this->component_pattern_number);

        $department = Department::find($this->department_id);
        $component = Components::find($this->component_id);
        $production_cell =  Cell::find($this->component_id);
        $time = $this->hours.':'.$this->minutes;

        $dateTime = $this->date.' '.$this->hours.':'.$this->minutes;

        if($this->validation($dateTime))
        {
            //dd('jestem tu');
            $end = new DateTime($this->date.' '.$time);
    
            $minutes_to_add = $component->duration;
    
            $end->add(new DateInterval('PT' . $minutes_to_add . 'M'));
    
            $event->title = $production_cell->cell_name.' '.$component->component_name.' '.$this->component_pattern_number;
            $event->start = $this->date.' '.$time;
            $event->end = $end;
            $event->url = 'https:\\google.com';
            $event->component_id = $component->id;
            $event->cell_id = $production_cell->id;
            $event->component_number = $this->component_pattern_number;
    
            $event->save();
        }else session()->flash('date', 'Termin juz jest zajęty.');

        
    }

    #[Layout('layouts.NDT')]
    public function render()
    {
        return view('livewire.ndt-booking');
    }
}
