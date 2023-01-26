<x-app-layout>

    @section('title','Games')

    <x-slot name="header">
    </x-slot>

    @livewire('game.show-trivia')

    <x-slot name="footer">
    </x-slot>

</x-app-layout>