<x-app-layout>

    @section('title', 'Perfil')

    <x-slot name="header">
    </x-slot>

    <div> 
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
        
        <x-Perfil.ShowPerfil />
            
            {{-- @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                @livewire('profile.delete-user-form')
            @endif --}}

        @endif

        {{-- @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            @livewire('profile.update-password-form')

            <x-jet-section-border />
        @endif

        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            @livewire('profile.two-factor-authentication-form')

            <x-jet-section-border />
        @endif

        @livewire('profile.logout-other-browser-sessions-form')
--}}
    </div>

    <x-slot name="footer">
    </x-slot>

</x-app-layout>
