<?php

namespace App\Livewire;

use App\Models\Wedding;
use App\Models\Wishes;
use Illuminate\Http\Request;
use Livewire\Component;

class CreateWish extends Component
{
    public $name;
    public $comment;
    public $hadir;
    public $nameWedding;

    protected $rules = [
        'name' => 'required',
        'hadir' => 'required',
        'comment' => 'required',
    ];

    public function mount(Request $request)
    {
        $this->name         = $request->to;
        $this->nameWedding  = $request->name;
    }

    public function render()
    {
        return view('livewire.create-wish');
    }

    public function createWish()
    {
        $wedding = Wedding::where('name', $this->nameWedding)->firstOrFail();
        $this->validate();
        Wishes::create([
            'wedding_id'    => $wedding->id,
            'name'          => $this->name,
            'hadir'         => $this->hadir,
            'comment'       => $this->comment
        ]);

        $this->name = "";
        $this->comment = "";
        $this->hadir = "";
        $this->dispatch('wishCreated');
    }
}
