<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Components;
use App\Models\Department;

class AddNewComponent extends Component
{
    public $components= [], $departments, $department_id, $department_name;

    public $component_id, $name, $update_name;
    
    public function mount()
    {
        $this->GetAllComponents();
        $this->GetAllDepartments();
        
    }

    public function Add()
    {   
        $this->dispatch('show-form');
        //$this->dispatch('show-update-modal');
    }

    public function GetAllComponents(){
        
        $this->components = Components::get();

        //$test

        //dd($this->components);
    }

    public function GetAllDepartments(){
        $this->departments = Department::get();
    }

    public function ShowUpdateModal($component_id){
        $this->component_id = $component_id;
        $edit = Components::find($component_id);
        //dd($this->edit);
        $this->update_name = $edit->component_name;
        $this->department_name = $edit->DepartmentName->department_name;
        $this->dispatch('show-update-modal');

    }
    public function Update(){

        
        $update = Components::find($this->component_id);
        $update->component_name = $this->update_name;
        $update->department_id = $this->department_id;
        $update->save();
        $this->redirectRoute('add_new_component');
    }

    public function Delete($component_id){
        $delete = Components::find($component_id);

        $delete->delete();
        $this->redirectRoute('add_new_component');
    }

    public function Store()
    {
        // Validate the request...
 
        //dd($this->department_id);
        $new_component = new Components;
 
        $new_component->component_name = $this->name;
        $new_component->department_id = $this->department_id;
 
        $new_component->save();
 
        $this->redirectRoute('add_new_component');
    }


    #[Layout('layouts.NDT')]
    public function render()
    {
        return view('livewire.add-new-component');
    }
}
