@extends('layouts.app')

@section('content')
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
@endsection
