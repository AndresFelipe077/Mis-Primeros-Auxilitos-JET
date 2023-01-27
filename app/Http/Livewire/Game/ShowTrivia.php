<?php

namespace App\Http\Livewire\Game;

use Livewire\Component;

class ShowTrivia extends Component
{

    //Vista home de videos
    public function game()
    {
        return view('games.games');
    }

    public function triviaShow(){
        return view('games.show-trivia');
    }

    public function render()
    {
        return view('livewire.game.show-trivia');
    }
}
