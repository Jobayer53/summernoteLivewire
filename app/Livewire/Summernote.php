<?php

namespace App\Livewire;

use App\Models\Summernote as ModelsSummernote;
use Livewire\Component;

class Summernote extends Component
{
    public $note,$text,$snote_id;

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
    public function update(){
        $this->validate([
            'text' => 'required',
            'note' =>'required',
        ]);
        $snote =ModelsSummernote::find($this->snote_id);
        $snote->note = $this->note;
        $snote->save();


       $this->dispatch('close-modal');




    }
    public function edit($id){

        $snote = ModelsSummernote::find($id);
        $this->note = $snote->note;
        $this->text = $snote->note;
        $this->snote_id = $snote->id;
    }
    public function delete($id){

        ModelsSummernote::find($id)->delete();

    }

    public function closeModal(){
        $this->reset();
        $this->resetValidation();
        $this->dispatch('close-modal');
    }
}
