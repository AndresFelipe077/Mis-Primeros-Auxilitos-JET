<x-app-layout>

    @section('title', 'Preguntitas 5 - 7')

    <x-slot name="header">
        <x-header />
    </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('QUESTIONS') }}</div>

                    <div class="card-body">


                        <h1>Edit Question</h1>

                        <form action="{{ route('questions.update', $question) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Titulo:</label>
                                <textarea class="form-control" id="title" name="title" rows="5" required>{{ $question->title }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Question</button>
                            <a href="{{ route('quiz.show', $quiz) }}" class="btn btn-danger">Regresar</a>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
