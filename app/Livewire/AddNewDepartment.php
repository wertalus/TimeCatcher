<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Department;
use Illuminate\Http\Request;

#[Layout('layouts.NDT')]
class AddNewDepartment extends Component
{

    public $departments, $department_id, $name, $update_name;
    
    public function mount()
    {
        $this->getAll();
        
    }

    public function Add()
    {   
        $this->dispatch('show-form');
        //$this->dispatch('show-update-modal');
    }

    public function getAll(){
        $this->departments = Department::get() ;
    }

    public function ShowUpdateModal($department_id){
        $this->department_id = $department_id;
        //$this->update_name = $update_name;
        $this->dispatch('show-update-modal');

    }
    public function Update(){
        
        $update = Department::find($this->department_id);
        $update->department_name = $this->update_name;
        $update->save();
        $this->redirectRoute('add_new_department');
    }

    public function Delete($department_id){
        
        $delete = Department::find($department_id);

        $delete->delete();
        $this->redirectRoute('add_new_department');
    }

    public function Store()
    {
        // Validate the request...
 
        $new_department = new Department;
 
        $new_department->department_name = $this->name;
 
        $new_department->save();
 
        $this->redirectRoute('add_new_department');
    }



    public function render()
    {
        return view('livewire.add-new-department');
    }
}
