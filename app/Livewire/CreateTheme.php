<?php

namespace App\Livewire;
use App\Models\ActionList;
use App\Models\ThemeList;
use Livewire\Component;
use Request;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Rule;


class CreateTheme extends Component
{
    public $theme;
    #[Rule('required', message: 'Wprowadź nazwę czynności.')]
    #[Rule('min:5', message: 'Nazwa jest zbyt krótka. Wymagane przynajmniej 5 znaków.')]
    public $action_name;

    #[Rule('required|integer', message: 'ID czynności.')]
    public $action_id;

    public $state = [];

    public $theme_name;
    public $theme_list_id;

    function mount(){
        $this->theme_name = session()->get('theme_name');
        $this->fetchThemeTasks();
    }
    
    function fetchThemeTasks(){
        $this->theme = ActionList::where('theme_list_id',ThemeList::select('id')
            ->where('theme_name', $this->theme_name)
            ->limit(1)
        )->get();
    }

    function AddTask(){ 
 
        $this->validate();
        
            $action = new ActionList();
            $action->action_name = $this->action_name;
            $action->action_id = $this->action_id;
            $theme_list_id = ThemeList::firstOrCreate(['theme_name'=>$this->theme_name]);
            $action->theme_list_id = $theme_list_id->id;
            $action->save();
            $this->reset(['action_name']);
            return redirect()->to("/create-theme/$this->theme_name")->with(['theme_name'=>$this->theme_name, 'message'=>'Dodano poprawnie !']);
    }

    function EditTask(ActionList $task) {
        
        $this->state = $task->toArray();

        $this->dispatch('show-form');
    }

    function SaveTask() {

        $task = ActionList::find($this->state['id']);
        $task->action_name = $this->state['action_name'];
        $task->action_id = $this->state['action_id'];
        $task->save();

        return redirect()->to("/create-theme/$this->theme_name")->with('message', 'Zapisano zmiany !');

    }

    public function render()
    {
        return view('livewire.create-theme');
    }
}
