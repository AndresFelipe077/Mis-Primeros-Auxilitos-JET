<div>
    <nav class="navbar navbar-default rounded bg-info w-100 p-3 fixed-top vh-md-100 animate__animated animate__backInDown"
        id="header">
        <img class="helicoptero" src="{{ asset('img/icons/helicoptero.png') }}" alt="Admin" width="50px" height="50px">
        <div class="container-fluid">
            <a class="iconimage" href="{{ route('quiz.index') }}"><img src="{{ asset('img/imgs/logo.png') }}"
                    alt="" width="80px" height="50px"></a>
            <div id="iconsvg" class="d-flex position-absolute ">

                @if (Auth::user()->roles->count() > 0)
                    <a class="rounded-circle bg-transparent" href="{{ route('admin') }}">
                        <img src="{{ asset('img/admin/admin.png') }}" alt="Admin" width="50px" height="50px">
                    </a>
                @endif


                <button wire:key="{{ Auth::user()->id }}" class="btn success rounded-circle bg-transparent"
                    onclick="location.href='{{ route('profile.show') }}'">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        @if (Auth::user()->external_auth == 'google' || Auth::user()->external_auth == 'facebook')

                            @if (Auth::user()->profile_photo_path != null)
                                <img class="rounded-circle" width="50px" height="50px"
                                    src="{{ Auth::user()->profile_photo_url }}{{-- Auth::user()->google_id !== null || Auth::user()->facebook_id !== null ? Auth::user()->profile_photo_path : Auth::user()->profile_photo_url --}}"
                                    alt="{{ Auth::user()->name }}" />
                            @else
                                <img class="rounded-circle" width="50px" height="50px"
                                    src="{{ Auth::user()->avatar }}{{-- Auth::user()->google_id !== null || Auth::user()->facebook_id !== null ? Auth::user()->profile_photo_path : Auth::user()->avatar --}}"
                                    alt="{{ Auth::user()->name }}" referrerpolicy="no-referrer" />
                            @endif
                        @else
                            <img class="rounded-circle" width="50px" height="50px"
                                src="{{ Auth::user()->profile_photo_url }}{{-- Auth::user()->google_id !== null || Auth::user()->facebook_id !== null ? Auth::user()->profile_photo_path : Auth::user()->profile_photo_url --}}"
                                alt="{{ Auth::user()->name }}" />
                        @endif
                    @else
                        {{ Auth::user()->name }}

                        <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    @endif
                </button>
            </div>
        </div>
    </nav>

</div>

@if (auth()->check() && auth()->user()->subscription && auth()->user()->subscription->subscription_status === 'aprobado')
    <!-- La condición se cumple -->
@else
    <!-- La condición no se cumple -->
    <a href="{{ url('/menuSuscripcion') }}" class="suscription">Suscribete </a>
@endif
