<x-app-layout>

    @section('title','Mis Primeros Auxilitos')

    <x-slot name="header">
        <x-header />
    </x-slot>

    @livewire('contenido.contenido-show')

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>