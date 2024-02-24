<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\ActionList;
use App\Models\ThemeList;
use Illuminate\Support\Arr;
use Astatroth\LaravelTimer\Timer;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class TimeCatcher extends Component
{
    public $theme_id;
    public $theme;
    public $no_persons=0;
    public $timers = array();
    public $checkPointNumber = 1;

    public $clock = 
        array(
            'status'=> 'desactive',
            'start' => NULL,
            'end' => NULL,
            'prev_round_time' => NULL,
            'round' =>NULL,
            'checkpoints' => array(),
        );

    public $current_time = 0;
    
    public $btnStatus1='enabled';
    public $btnStatus2='disabled';
    public $btnStatus3='disabled';
    public $btnStatus4='disabled';
    public $btnIncrease = 'enabled';
    public $btnDecrease = 'enabled';
    
    function mount($id){
        $this->theme_id = $id;
        $this->fetchThemeTasks();
    }

    function fetchThemeTasks(){
        $this->theme = ActionList::addSelect(['theme_name' => ThemeList::select('theme_name')
        ->where('id', $this->theme_id)
        ])
       ->where('theme_list_id', $this->theme_id)->get();
    }

    function decrease(){
        if($this->no_persons>0)
        {
            Arr::forget($this->timers,'Zegar '.$this->no_persons);
            $this->no_persons--;
            $this->fetchThemeTasks();   
        }
        $this->fetchThemeTasks();
    }

    function increase(){
        if($this->no_persons<3)
        {
            $this->no_persons++;
            $this->timers = Arr::add($this->timers,'Zegar '.$this->no_persons,$this->clock);
            $this->fetchThemeTasks();
        }
        $this->fetchThemeTasks();
    }

    function StartTimer() {

        if(count($this->timers)>0)
            {
                foreach ($this->timers as $key => $value) {
                    foreach ($this->theme as $key2 => $value2) {
                    $this->timers[$key]['checkpoints']=Arr::add($this->timers[$key]['checkpoints'],$value2->action_name,[]);
                    };
                };

                data_set($this->timers, '*.start', microtime(true));
                $this->btnStatus1 = 'disabled';
                $this->btnStatus2 = 'enabled';
                $this->btnIncrease = 'disabled';
                $this->btnDecrease = 'disabled';
                
                session()->flash('start-ok', 'Zegary włączone');

                //dd($this->timers);
            }
        else{

            session()->flash('start-nok', 'Brak zegarów do wystartowania');
        }   

        $this->fetchThemeTasks(); 

    }

    function StopTimer() {

        if(count($this->timers)>0){
            error_log($this->timers['Zegar 1']['status']);
            data_set($this->timers, '*.round', microtime(true));
            $time = $this->timers['Zegar 1']['round'] - $this->timers['Zegar 1']['start'];
            //$time = number_format((float)$time/60, 2, ',', '');
            data_set($this->timers,'*.end', $time);

            $this->btnStatus2 = 'disabled';
            $this->btnStatus3 = 'enabled';
            $this->btnStatus4 = 'enabled';

            session()->flash('start-ok', 'Zegary zostały wyłączone');
        }
        $this->checkPointNumber = 1;
        $this->fetchThemeTasks();
    }

    function ClearTimers(){
        $this->timers=array();
        $this->btnStatus4 = 'disabled';
        $this->btnStatus3 = 'disabled';
        $this->btnStatus1 = 'enabled';
        $this->btnIncrease = 'enabled';
        $this->btnDecrease = 'enabled';
        $this->no_persons = 0;
        
        session()->flash('start-ok', 'Zegary zostały wyczyszczone');
    }

    function CheckPointTime($description) {
        foreach ($this->timers as $key => $value) {
            if(strcmp($value['status'], 'active')==0){
                    
                    //$time = number_format((float)$time/60, 2, ',', '');
                    
                    if($this->checkPointNumber-1==0)
                    {
                        error_log('round :'.$this->timers[$key]['round']);
                        error_log('prev_round :'.$this->timers[$key]['prev_round_time']);
                        data_set($this->timers, $key.'.round', microtime(true));
                        $time = $this->timers[$key]['round'] - $this->timers[$key]['start'];
                        $time = number_format((float)$time/60, 2, ',', '');
                        data_set($this->timers, $key.'.prev_round_time', $this->timers[$key]['round']);

                    }
                    else
                    {
                        data_set($this->timers, $key.'.prev_round_time', $this->timers[$key]['round']);
                        data_set($this->timers, $key.'.round', microtime(true));
                        $time = $this->timers[$key]['round'] - $this->timers[$key]['prev_round_time'];
                        $time = number_format((float)$time/60, 2, ',', '');
                        error_log('Czas:'.$time);
                    }
                    //$id++;
                    
                    $this->timers[$key]['checkpoints'][$description]=Arr::add( $this->timers[$key]['checkpoints'][$description],$this->checkPointNumber,$time);
            }

        foreach ($this->timers[$key]['checkpoints'][$description] as $key => $value) {
            error_log($value);
        }
        }
        $this->checkPointNumber++;


        $this->fetchThemeTasks();
        
    }

    function ShowTimers()
    {
        dd($this->timers);
    }

    public function ClockSelector($clockNo){
        
        //dd($clockNo);
        
        if(strcmp($clockNo,'Zegar 1')==0) {
            
            $status = Arr::get($this->timers, 'Zegar 1.status');
            
            if(strcmp($status,'desactive')==0) {
                
                data_set($this->timers,'Zegar 1.status','active');

            }else data_set($this->timers,'Zegar 1.status','desactive');
        }

        if(strcmp($clockNo,'Zegar 2')==0) {
            
            $status = Arr::get($this->timers, 'Zegar 2.status');
                
            if(strcmp($status,'desactive')==0) {
                
                data_set($this->timers,'Zegar 2.status','active');

            }
            else data_set($this->timers,'Zegar 2.status','desactive');
        }

        if(strcmp($clockNo,'Zegar 3')==0) {
            
            $status = Arr::get($this->timers, 'Zegar 3.status');
                
            if(strcmp($status,'desactive')==0) {
                
                data_set($this->timers,'Zegar 3.status','active');

            }
            else data_set($this->timers,'Zegar 3.status','desactive');
        }

        if(strcmp($clockNo,'Razem')==0) {

            for ($i=1; $i<=$this->no_persons; $i++){
                data_set($this->timers,'Zegar '.$i.'.status','active');
            }
        }
        $this->fetchThemeTasks(); 
    }

    public function SaveToFile(){
        

        if (! Storage::disk('public')->put('plik.json', json_encode($this->timers))) {
            
        }
        $this->btnStatus1 = 'enabled';
        $this->btnStatus3 = 'disabled';
        $this->btnIncrease = 'enabled';
        $this->btnDecrease = 'enabled';
    }

    #[Layout('layouts.main')]
    public function render()
    {
        return view('livewire.time-catcher');
    }
}
