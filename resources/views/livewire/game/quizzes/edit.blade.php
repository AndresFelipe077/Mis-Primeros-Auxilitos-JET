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


                        <h1>Edit Quiz</h1>

                        <form action="{{ route('quiz.update', $quiz) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Titulo:</label>
                                <textarea class="form-control" id="title" name="title" rows="5" required>{{ $quiz->title }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="description">Body:</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required>{{ $quiz->description }}</textarea>
                            </div>


                            <button type="submit" class="btn btn-primary">Update Quiz</button>
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
