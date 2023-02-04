<link id="image-head" rel="shortcut icon" href="{{ asset('img/icons/algodon.png') }}" type="image/x-icon">
<x-app-layout>
    
    <div>
        @section('title', 'Videos')

        <x-slot name="header">
            <x-header />
        </x-slot>

        <div class="container" >

          <div class="row ">

        <div class="text-center mt-3">
            <a href="{{ route('video.create') }}" class="btn btn-outline-success mt-5"><img
                    src="{{ asset('img/icons/crear2.png') }}" alt="Image Trivias" width="50px" height="50px"></a>
        </div>

        @foreach ($videos as $video)
            <div class="col-12 col-md-6 mt-5 col-lg-4">
                <div class="card m-3 text-center rounded animate__animated animate__bounceIn">
                    <div class="card-body shadow">
                        <h5 class="card-title">{{ $video->video_title }}</h5>
                        <div class="contenedor rounded">
                            <video id="video-tagg"
                                class="mx-auto m-3 rounded" controls>
                                <source src="{{ asset($video->video_url) }}">
                                Tu navegador no soporta elementos de video😥.
                            </video>
                        </div>
                        <p class="card-text">{{ $video->description }}</p>
                        <div class="text-center mt-3">
                            <a href="#" class="btn btn-outline-primary "><img
                                    src="{{ asset('img/icons/vamos2.png') }}" alt="Image Trivias" width="50px"
                                    height="50px"></a>
                            <a href="{{ route('triviaEdit', $video) }}" class="btn btn-outline-danger"><img
                                    src="{{ asset('img/icons/editar3.png') }}" alt="Image Trivias" width="50px"
                                    height="50px"></a>
                        </div>
                    </div>
                </div>
            </div>

{{--  --}}
        @endforeach
      </div>
    
    </div>


    <div class="">
        <ul class="pagination pagination-lg">
            <li class="page-item active mb-5" aria-current="page">
                <span class="page-link bg-light h4">{{ $videos->links() }}</span>
            </li>
        </ul>
    </div>

    <x-slot name="footer">
        <x-footer />
    </x-slot>
    
</x-app-layout>
