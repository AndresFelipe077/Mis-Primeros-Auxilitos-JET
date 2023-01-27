<?php

namespace App\Http\Livewire\Game;

use Livewire\Component;

class ShowAdivinar extends Component
{

    //Vista home de videos
    public function game()
    {
        return view('games.show-trivia');
    }

    public function render()
    {
        return view('livewire.game.show-adivinar');
    }
}
