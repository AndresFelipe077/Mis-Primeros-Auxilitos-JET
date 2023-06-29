<x-app-layout>

    @section('title', 'Preguntitas')

    <x-slot name="header">
        <x-header />
    </x-slot>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Resultado del Quiz</h1>
            </div>

            <div class="card-body">

                <p>Puntaje obtenido: {{ $score }}</p>

                {{-- <h2>Preguntas Respondidas</h2>
                <ul>
                    @foreach ($questions as $question)
                        <li>{{ $question->text }}</li>
                    @endforeach
                </ul> --}}

            </div>
        </div>
    </div>
    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
