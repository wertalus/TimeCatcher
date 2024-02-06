<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateTheme extends Controller
{

    public $param;

     function mount($theme_name) {
        
        $this->param=session()->get('theme_name');
        
    }

    public function index()
    {
        //dd($this->param);
        return view('create-theme',['param'=>$this->param]);
        
    }
}
