<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;


use App\Models\Note;

class NotesComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "asc";

    public $newtitle;
    public $title, $description, $description2;

    public $note_id;
    public $delete_id;


    public function storeNote()
    {

        $this->validate([
            'title' =>'required'
        ]);

        $note = new Note();

        $note->title = $this->newtitle;

        $note->save(); 
        session()->flash('message','Note Created.');
        $this->emit('addDepartment');


        $this->newtitle = null;
    }


    public function newNote()
    {
        $this->newtitle = null;
        $this->title = null;
        $this->description = null;
        $this->description2 = null;
        $this->note_id = null;
        $this->search = "";
    }



    public function getNote($id)
    {
        $this->note_id = $id;

        $note = Note::find($id);

        $this->title = $note->title;
        $this->description = $note->description;
        $this->description2 = $note->description;


    }


    public function updateNote()
    {
        $this->validate([
            'title' =>'required'
        ]);

        if ($this->note_id !=null) {
            $note = Note::find($this->note_id);

            $note->title = $this->title;
            $note->description = $this->description;

            $note->save();
            session()->flash('message','Note Saved.');
            $this->description2 = $this->description;
        } else {
            $note = new Note();
            $note->title = $this->title;
            $note->description = $this->description;

            $note->save();
            session()->flash('message','Note Saved.');

            $tempNote = Note::latest()->first();

            self::getNote($tempNote->id);

        }
        

       
    }

    public function deleteID($id)
    {
        $this->delete_id = $id;
    }
    public function delete()
    {
        Note::find($this->delete_id)->delete();
        $this->emit('storeSomething');
        return redirect()->route('notes');
        // dd($this->delete_id);
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == "asc") {
            $this->sortDirection = "desc";
        }
        else
        {
            $this->sortDirection = "asc";
        }

        return $this->sortBy = $field;
    }

    public function render()
    {
        // $allNotes = Note::orderBy("id","asc")->search(trim($this->search));
        $allNotes = Note::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        // dd($allNotes);
        return view('livewire.notes-component',compact('allNotes'))->layout('layouts.base');
    }
}
