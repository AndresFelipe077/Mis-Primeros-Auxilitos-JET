<link rel="shortcut icon" href="{{ asset('img/profile/profile2.png') }}" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('css/eye.css') }}">
@extends('adminlte::page')

@section('content')

    <x-app-layout>

    @section('title', 'Cambiar contraseña')

    <x-slot name="header">
    </x-slot>

    <div class="m-5">

        <h1>Cambiar contraseña</h1>

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            @livewire('profile.update-password-form')
        @endif

    </div>



    <x-slot name="footer">
    </x-slot>

</x-app-layout>

@endsection
