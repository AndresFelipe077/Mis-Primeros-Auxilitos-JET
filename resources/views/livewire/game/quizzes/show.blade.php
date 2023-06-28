<x-app-layout>

    @section('title', 'Preguntitas')

    <x-slot name="header">
        <x-header />
    </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <a href="{{ route('home') }}" class="btn btn-success">Home</a>

                    <div class="card-header h1">{{ __('QUIZ') }}</div>

                    <div class="card-body">
                        <div class="">
                            <h1>{{ $quiz->title }}</h1>
                            <p>{{ $quiz->body }}</p>
                            <p>Author: {{ $quiz->user->name }}</p>
                            <p>Created At: {{ $quiz->created_at }}</p>

                            <hr>

                            <h2>QUESTIONS</h2>
                        </div>

                        {{-- Mostrar las questions --}}

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        @if (!empty($questions) && count($questions) > 0)
                            @foreach ($questions as $question)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p>{{ $question->title }}</p>
                                        <p>Created At: {{ $question->created_at }}</p>
                                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-danger">Editar
                                            pregunta</a>
                                        <a href="{{ route('questions.show', $question->id) }}"
                                            class="btn btn-success">Respuestas</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No hay preguntas para este quiz.</p>
                        @endif




                        <a href="{{ route('questions.create', $quiz) }}" class="btn btn-primary">Add Question</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
