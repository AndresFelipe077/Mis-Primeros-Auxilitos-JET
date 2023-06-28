@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $quiz->title }}</div>

            <div class="card-body">
                <p>{{ $quiz->description }}</p>

                <form action="{{ route('quiz.submit', ['quiz' => $quiz->id]) }}" method="POST">
                    @csrf

                    <h4>Preguntas:</h4>

                    @foreach ($quiz->questions as $question)
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5>{{ $question->title }}</h5>
                                <p>{{ $question->description }}</p>

                                @foreach ($question->answers as $answer)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                            id="answer{{ $answer->id }}" value="{{ $answer->id }}" required>
                                        <label class="form-check-label" for="answer{{ $answer->id }}">
                                            {{ $answer->content }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary mt-3">Enviar respuestas</button>
                    <a class="btn btn-danger mt-3" href="{{ route('home') }}">Regresar al home</a>
                </form>
            </div>
        </div>
    </div>
@endsection
