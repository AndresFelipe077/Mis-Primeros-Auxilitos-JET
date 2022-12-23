@props(['title' => __('Confirma tu contraseña'), 'content' => __('¡¡¡ Por tu seguridad, confirma tu contraseña para continuar !!!'), 'button' => __('Confirmar')])

@php
    $confirmableId = md5($attributes->wire('then'));
@endphp

<span {{ $attributes->wire('then') }} x-data x-ref="span"
    x-on:click="$wire.startConfirmingPassword('{{ $confirmableId }}')"
    x-on:password-confirmed.window="setTimeout(() => $event.detail.id === '{{ $confirmableId }}' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);">
    {{ $slot }}
</span>

@once
    <x-jet-dialog-modal wire:model="confirmingPassword">
        <x-slot name="title">
            {{ $title }}
        </x-slot>

        <x-slot name="content">
            {{ $content }}

            <div class="mt-4" x-data="{}"
                x-on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
                <x-jet-input type="password" class="{{ $errors->has('confirmable_password') ? 'is-invalid' : '' }}"
                    placeholder="{{ __('Contraseña') }}" x-ref="confirmable_password" wire:model.defer="confirmablePassword"
                    wire:keydown.enter="confirmPassword" />

                <x-jet-input-error for="confirmable_password" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <button type="button" wire:click="stopConfirmingPassword" wire:loading.attr="disabled" class="btn btn-danger">Cancelar</button>

            <x-jet-button class="ms-2" wire:click="confirmPassword" wire:loading.attr="disabled">
                <div wire:loading wire:target="confirmPassword" class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>

                {{ $button }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
@endonce
