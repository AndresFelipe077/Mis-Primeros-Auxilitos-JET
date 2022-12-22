<div>
    {{-- header --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    <nav
        class="navbar navbar-default rounded bg-info w-100 p-3 fixed-top vh-md-100 animate__animated animate__backInDown">
        <div class="container-fluid">
            <a class="navbar-brand" href=""><img src="{{ asset('img/imgs/logo.png') }}" alt="" width="65px"
                    height="50px"></a>
            <div id="iconsvg" class="d-flex position-absolute ">

                <a class="rounded-circle" href="{{ route('admin') }}">
                    <img src="{{asset('img/admin/admin.png')}}" alt="Admin" width="50px" height="50px">
                </a>


                <a class="rounded-circle" href="{{ route('dashboard.create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-plus-circle-fill text-light" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                    </svg>
                </a>
                

                <button wire:key="{{ Auth::user()->id }}" class="btn success rounded-circle" onclick="location.href='{{ route('profile.show') }}'">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <img class="rounded-circle" width="50px" height="50px" src="{{-- Auth::user()->profile_photo_url --}}{{ (Auth::user()->google_id !== null ||  Auth::user()->facebook_id !== null ) ? Auth::user()->profile_photo_path : Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        @else
                        {{ Auth::user()->name }}

                        <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg> 
                    @endif
                </button>
            </div>
        </div>
    </nav>

</div>
