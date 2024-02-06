<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\ThemeList;

class MenuGrid extends Component
{
    #[Rule('required', message: 'Wprowadź nazwę szablonu.')]
    #[Rule('min:5', message: 'Nazwa jest zbyt krótka. Wymagane przynajmniej 5 znaków.')]
    public $theme_name;

    function AddNew() {
        $this->dispatch('show-form');
        
    }

    function CreateTheme() {
        $this->validate();
        
        if (ThemeList::where('theme_name', $this->theme_name)->exists()) {
            session()->flash('message', 'Taki szablon juz istnieje. Podaj inną nazwę.');
        }
        else return redirect()->to("/create-theme/$this->theme_name")->with('theme_name',$this->theme_name);

    }

    public function render()
    {
        return view('livewire.menu-grid');
    }
}
