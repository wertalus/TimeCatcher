<?php

namespace App\Livewire;
use App\Models\ThemeList;
use Livewire\Component;
use Livewire\Attributes\Layout;

class ShowThemes extends Component
{

    public $themes;
    
    function mount(){
        $this->fetchThemeTasks();
    }

    function fetchThemeTasks(){
        $this->themes = ThemeList::all()->unique('theme_name');
    }
    function EditTheme(String $theme_name) {
        
        return redirect()->to("/create-theme/$theme_name")->with('theme_name',$theme_name);
    }

    #[Layout('layouts.main2')]
    public function render()
    {
        return view('livewire.show-themes');
    }
}
