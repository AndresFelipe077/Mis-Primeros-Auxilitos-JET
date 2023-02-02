<?php

namespace App\Http\Livewire\Game;

use App\Models\Trivia;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowTrivia extends Component
{
    use WithFileUploads;
    use WithPagination;


    //Vista home de videos
    
    // public function render()
    // {
    //     $trivias = Trivia::orderBy('id','desc')->paginate(9);

    //     return view('livewire.game.show-trivia', compact('trivias'));
    // }



}
