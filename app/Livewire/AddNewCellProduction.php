<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cell;
use App\Models\Department;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

class AddNewCellProduction extends Component
{
    
    public $departments, $cells, $cell_id, $update_name;
    
    

    public $name;


    public $department_id;
    
    public function mount()
    {
        $this->getAll();
        $this->departments = Department::get();
        
    }

    public function Add()
    {   
        $this->dispatch('show-form');
        //$this->dispatch('show-update-modal');
    }

    public function getAll(){
        $this->cells = Cell::get() ;
    }

    public function ShowUpdateModal($cell_id){
        $this->cell_id = $cell_id;
        //$this->update_name = $update_name;
        $this->dispatch('show-update-modal');

    }
    public function Update(){
        
        $update = Cell::find($this->cell_id);
        $update->cell_name = $this->update_name;
        $update->save();
        $this->redirectRoute('add_new_cell');
    }

    public function Delete($cell_id){
        
        $delete = Cell::find($cell_id);

        $delete->delete();
        $this->redirectRoute('add_new_cell');
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'department_id' => 'required',
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'Podaj nazwę koórki produkcyjnej.',
            'name.min' => 'Wprowadź minimum 2 znaki.',
            'department_id.required' => 'Wybierz wydział.'
        ];
    }

    public function Store()
    {
        // Validate the request...

        $this->validate();

            $new_cell = new Cell;
     
            $new_cell->cell_name = $this->name;
    
            $new_cell->department_id  = $this->department_id;
     
            $new_cell->save();
     
            $this->redirectRoute('add_new_cell');

    }

    #[Layout('layouts.NDT')]
    public function render()
    {
        return view('livewire.add-new-cell-production');
    }
}
