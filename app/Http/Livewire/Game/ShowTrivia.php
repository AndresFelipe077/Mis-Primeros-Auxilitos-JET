<?php

namespace App\Http\Livewire\Game;

use App\Models\Trivia;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class ShowTrivia extends Component
{
    use WithFileUploads;
    use WithPagination;//Para las paginaciones


    //Vista home de videos
    public function game()
    {
        return view('games.games');
    }

    public function triviaShow(){
        $trivias = Trivia::orderBy('id','desc')->paginate(9);
        return view('livewire.game.show-trivia', compact('trivias'));
    }

    public function triviaCreate(){
        return view('livewire.game.create-trivia');
    }

    public function triviaEdit()
    { 
        return view('livewire.game.edit-trivia');
    }
    

    // public function render()
    // {
    //     $trivias = Trivia::orderBy('id','desc')->paginate(9);

    //     return view('livewire.game.show-trivia', compact('trivias'));
    // }
}
