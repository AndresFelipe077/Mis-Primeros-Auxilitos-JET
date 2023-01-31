<link id="image-head" rel="shortcut icon" href="{{ asset('img/imgs/logo.png') }}" type="image/x-icon">
<x-app-layout>
      
    @section('title','Home')

    <x-slot name="header">
        <x-header />
    </x-slot>

    @livewire('contenido.contenido-show')

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>