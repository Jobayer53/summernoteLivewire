<?php

namespace App\Livewire;

use App\Models\Summernote as ModelsSummernote;
use Livewire\Component;

class Summernote extends Component
{
    public $note,$text;

    public function render()
    {
        $snote = ModelsSummernote::orderBy('id','desc')->get();
        return view('livewire.summernote',compact('snote'));
    }
    public function store(){
        $this->validate([
            'text' => 'required',
            'note' =>'required',
        ]);
       $snote = new ModelsSummernote();
       $snote->note = $this->note;
       $snote->save();


    }
}
