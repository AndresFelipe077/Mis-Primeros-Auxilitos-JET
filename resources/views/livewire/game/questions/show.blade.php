<x-slot name="footer">
    <x-footer />
</x-slot>

</x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('QUESTIONS') }}</div>



                    <div class="card-body">
                        <div class="">
                            <h1>{{ $question->title }}</h1>
                            <p>{{ $question->body }}</p>
                            {{-- <p>Author: {{ $question->user->name }}</p> --}}
                            <p>Created At: {{ $question->created_at }}</p>

                            <hr>

                            <h2>Answers</h2>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (!empty($answers) && count($answers) > 0)
                            @foreach ($answers as $answer)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p>{{ $answer->content }}</p>
                                        <p>Created At: {{ $answer->created_at }}</p>
                                        <a href="{{ route('answers.edit', $answer->id) }}" class="btn btn-danger">Editar respuesta</a>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No hay respuestas para esta pregunta.</p>
                        @endif

                        <a href="{{ route('answers.create', $question->id) }}" class="btn btn-primary">Add Answer</a>
                        <a href="{{ route('quiz.show', $quiz) }}" class="btn btn-danger">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
