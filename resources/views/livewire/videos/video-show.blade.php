<link id="image-head" rel="shortcut icon" href="{{ asset('img/icons/algodon.png') }}" type="image/x-icon">
<x-app-layout>
    <div>
        @section('title', 'Videos')

        <x-slot name="header">
            <x-header />
        </x-slot>

        <div class="text-center mt-3">
            <a href="{{ route('video.create') }}" class="btn btn-outline-success mt-5"><img
                    src="{{ asset('img/icons/crear2.png') }}" alt="Image Trivias" width="50px" height="50px"></a>
        </div>

        @foreach ($videos as $video)
            <div class="col mb-4 animate__animated animate__wobble">

                <div class="card shadow border-dark bg-white">
                    <div class="card-header">
                        {{ $video->video_title }}
                    </div>
                    <div class="card-body ">
                        <div class="rounded">
                            <video class="imagen card-img-top rounded " src="{{ asset($video->video_url) }}"
                                alt="Images Mis Primeros Auxilitos" width="200px" height="200px" controls>
                                {{-- <iframe width="100%" src="{{ $video->video_url }}" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe> --}}
                        </div>

                        <p class="card-text">
                            {{ $video->description }}
                        </p>
                    </div>

                </div>

            </div>
        @endforeach
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
