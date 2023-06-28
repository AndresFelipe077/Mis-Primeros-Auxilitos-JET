<x-slot name="footer">
    <x-footer />
</x-slot>

</x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <a class="btn btn-success" href="{{ route('home') }}">Home</a>
                    <div class="card-header">{{ __('QUIZ') }}</div>

                    <div class="card-body">
                        <h1>Create Quiz</h1>
                        <form action="{{ route('quiz.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
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
