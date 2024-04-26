<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class Sidebar extends Component
{
    
    public $current_time = 'hej';

    public function moount(){
        
    }

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function render()
    {
        //$this->current_time = Carbon::now('Europe/Warsaw')->toTimeString();
        return view('livewire.sidebar',['current_time'=>$this->current_time]);
    }
}
