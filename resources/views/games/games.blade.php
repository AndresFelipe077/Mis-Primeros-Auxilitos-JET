<link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
<x-app-layout>

    @section('title', 'Games')

    <x-slot name="header">
        <x-header />
    </x-slot>


    <div class="container mx-auto">

        <div class="row">

            <div class="col-sm-6 mt-5">
                {{-- imagen1 --}}
                <img src="{{asset('img/logo/logo.png')}}" alt="" width="300px" height="300px">
                <a href="{{route('dashboard.trivia')}}" class="btn btn-primary">Trivias</a>
            </div>


            <div class="col-sm-6 mt-5">
                {{-- imagen2 --}}
                <img src="{{asset('img/menu/challengue2.png')}}" alt="" width="250px" height="250px">
                <a href="#" class="btn btn-primary">Adivinanza</a>
            </div>

        </div>

    </div>

    {{-- @livewire('game.show-trivia')

    @livewire('game.show-adivinar') --}}




    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
