<?php

namespace App\Livewire;
use App\Models\Schedule;
use Livewire\Component;
use Livewire\Attributes\Renderless;

class Navbar extends Component
{
    public $notAccepted, $numberOfNotAccepted=0, $task_id, $list_to_accept = [], $url;

    public function mount()
    {
        $this->notAccepted = Schedule::where('status_id',1)->get();

        $this->numberOfNotAccepted = count($this->notAccepted);
        //dd($this->notAccepted);

    }
    public function showexample()
    {
        $this->url = url()->previous();
        //dd($this->url);
        $this->redirectRoute('todo');
    }

    public function accept($id)
    {
        $status_change = Schedule::where('id',$id)->update(['status_id' => 2]);

        $this->mount();
    }

    public function unread()
    {
        // ...
 
        session()->flash('unread', 'Brak nieprzyjętych zleceń');

    }
    public function Add()
    {   
        $this->dispatch('show-accept-task-modal');
    }

    public function Details()
    {   
        $this->dispatch('show-details-modal');
    }

    public function render()
    {
        return view('livewire.navbar')

        ->layout('layouts.NDT');

    }
}
