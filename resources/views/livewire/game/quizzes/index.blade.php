<x-app-layout>

    @section('title', 'Preguntitas')

    <x-slot name="header">
        <x-header />
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('QUIZZES') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <h1>{{ __('List quizzes!') }}</h1>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <a href="{{ route('quiz.create') }}" class="btn btn-primary mb-3">Create Quiz</a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quizzes as $quiz)
                                    <tr>
                                        <td>{{ $quiz->title }}</td>
                                        <td>
                                            <a href="{{ route('quiz.show', $quiz) }}" class="btn btn-info">Show</a>
                                            <a href="{{ route('quiz.edit', $quiz) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('quiz.destroy', $quiz) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this question?')">Delete</button>
                                            </form>

                                            <a href="{{ route('quiz_responder.show', $quiz) }}"
                                                class="btn btn-success">Responder Quiz</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
