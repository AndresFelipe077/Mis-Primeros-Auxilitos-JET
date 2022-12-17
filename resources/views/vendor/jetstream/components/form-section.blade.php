@props(['submit'])

<div {{ $attributes->merge(['class' => 'row']) }}>
    
    <div class="col-md-12">
        <div class="card shadow-sm">
            <form wire:submit.prevent="{{ $submit }}">
                <div class="card-body">
                {{ $form }}
                </div>

                @if (isset($actions))
                    <div class="card-footer d-flex justify-content-center">
                        {{ $actions }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
