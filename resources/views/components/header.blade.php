


<nav class="navbar navbar-expand-lg bg-purple text-white">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled text-white" href="#" tabindex="-1" aria-disabled="true"></a>
          </li>
        </ul>
        <form >
            <img class="helicoptero" src="{{ asset('img/icons/helicoptero.png') }}" alt="Admin" width="50px" height="50px">
        </form>
      </div>
    </div>
  </nav>
  
<div class="smith">
<div class="input-container">
    <input placeholder="Buscar videos o imagenes" class="input" name="text" type="text">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <rect fill="white"></rect> <path d="M7.25007 2.38782C8.54878 2.0992 10.1243 2 12 2C13.8757 2 15.4512 2.0992 16.7499 2.38782C18.06 2.67897 19.1488 3.176 19.9864 4.01358C20.824 4.85116 21.321 5.94002 21.6122 7.25007C21.9008 8.54878 22 10.1243 22 12C22 13.8757 21.9008 15.4512 21.6122 16.7499C21.321 18.06 20.824 19.1488 19.9864 19.9864C19.1488 20.824 18.06 21.321 16.7499 21.6122C15.4512 21.9008 13.8757 22 12 22C10.1243 22 8.54878 21.9008 7.25007 21.6122C5.94002 21.321 4.85116 20.824 4.01358 19.9864C3.176 19.1488 2.67897 18.06 2.38782 16.7499C2.0992 15.4512 2 13.8757 2 12C2 10.1243 2.0992 8.54878 2.38782 7.25007C2.67897 5.94002 3.176 4.85116 4.01358 4.01358C4.85116 3.176 5.94002 2.67897 7.25007 2.38782ZM9 11.5C9 10.1193 10.1193 9 11.5 9C12.8807 9 14 10.1193 14 11.5C14 12.8807 12.8807 14 11.5 14C10.1193 14 9 12.8807 9 11.5ZM11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16C12.3805 16 13.202 15.7471 13.8957 15.31L15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.31 13.8957C15.7471 13.202 16 12.3805 16 11.5C16 9.01472 13.9853 7 11.5 7Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
  </div>
</div>
<div>
    <nav
        class="" id="header">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('quiz.index')}}"><img src="{{ asset('img/imgs/logo.png') }}" alt="" width="70px"
                    height="60px"></a>
            <div id="iconsvg" class="d-flex position-absolute ">

                <a class="rounded-circle bg-transparent" href="{{ route('admin') }}">
                    <img src="{{ asset('img/admin/admin.png') }}" alt="Admin" width="50px" height="50px">
                </a>


                {{-- <a class="rounded-circle bg-transparent" href="{{ route('dashboard.create.image') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-plus-circle-fill text-light" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                    </svg>
                </a> --}}



              

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
