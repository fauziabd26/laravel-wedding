<?php

namespace App\Livewire;

use App\Models\Wedding;
use App\Models\Wishes;
use Illuminate\Http\Request;
use Livewire\Component;

class ListWish extends Component
{
    protected $listeners = ['wishCreated' => '$refresh'];
    public $nameWedding;

    public function mount(Request $request)
    {
        $this->nameWedding  = $request->name;
    }

    public function render()
    {
        $wedding    = Wedding::where('name', $this->nameWedding)->firstOrFail();
        return view('livewire.list-wish', [
            'wish' => Wishes::where('wedding_id', $wedding->id)->orderby('created_at', 'desc')->get()
        ]);
    }
}
