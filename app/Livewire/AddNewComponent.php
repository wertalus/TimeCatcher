<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Components;
use App\Models\Department;
use App\Models\Cell;
use Livewire\Attributes\Locked;
use Illuminate\Http\Request;

class AddNewComponent extends Component
{

    public $components= [], $departments, $department_id, $cell_id, $cell_name=[], $department_name, $delete, $duration, $cells;

    public $component_id, $name, $update_name;
    
    public function mount()
    {
        $this->GetAllComponents();
        $this->GetAllDepartments();
        $this->GetCells();
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'department_id' => 'required',
            'cell_id' => 'required',
            'duration' =>'required|integer',
            //'update_name' => 'required|min:3'
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'Podaj nazwę komponentu.',
            'name.min' => 'Wprowadź minimum 3 znaki.',
            'department_id.required' => 'Wybierz wydział.',
            'cell_id.required' => 'Wybierz komórkę produkcyjną.',
            'duration.required'=> 'Podaj czas badania',
            'duration.integer'=> 'Podaj wartość liczbową',
        ];
    }

    public function Add()
    {   
        $this->dispatch('show-form');
    }

    public function GetAllComponents()
    {
        $this->components = Components::get();
    }

    public function GetAllDepartments(){
        $this->departments = Department::get();
    }

    public function GetCells(){
        $this->cells = Cell::where('department_id',$this->department_id)->get();
    }

    public function ShowUpdateModal($component_id){
        
        $this->component_id = $component_id;
        $edit = Components::find($component_id);
        $this->name = $edit->component_name;
        $this->department_name = $edit->Department->department_name;
        $this->department_id = $edit->department_id;
        $this->GetCells();
        $this->cell_id = $edit->cell_id;
        $this->duration = $edit->duration;

        $this->dispatch('show-update-modal');

    }
    public function Update(){

        $this->validate();

        $update = Components::find($this->component_id);
        $update->component_name = $this->name;
        $update->department_id = $this->department_id;
        $update->duration = $this->duration;
        $update->cell_id = $this->cell_id;
        $update->save();
        $this->redirectRoute('add_new_component');
    }

    public function DeleteModal($component_id){
        
        $this->delete = Components::find($component_id);
        $this->dispatch('show-delete-modal');
    }

    public function Delete(){

        $this->delete->delete();
        $this->redirectRoute('add_new_component');
    }

    public function Store()
    {
        $this->validate();
 
        $new_component = new Components;
        $new_component->component_name = $this->name;
        $new_component->cell_id = $this->cell_id;
        $new_component->department_id = $this->department_id;
        $new_component->duration = $this->duration;
        $new_component->save();
 
        $this->redirectRoute('add_new_component');
    }



    #[Layout('layouts.NDT')]
    public function render()
    {
        return view('livewire.add-new-component');
    }
}
