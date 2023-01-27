<link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
<x-app-layout>

    @section('title','Games')

    <x-slot name="header">
        <x-header />
    </x-slot>

    @livewire('game.show-trivia')

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>